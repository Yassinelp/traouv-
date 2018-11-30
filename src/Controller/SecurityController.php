<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupère l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        /// Dernier nom d'utilisateur entré par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) Construction du formulaire + Création d'un nouvel utilisateur
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) Gère la récupération des données (POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encodage du mot de passe
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            // Rôle automatiquement défini à chaque création de nouveau compte : utilisateur
            $user->setRoles(['ROLE_USER']);

            // 4) Enregistrement du nouvel utilisateur
            // Récupération de l'Entity Manager de Doctrine
            $entityManager = $this->getDoctrine()->getManager();
            // Ajout du nouvel utlisateur dans l'Entity Manager
            $entityManager->persist($user);
            // Exécution des requêtes SQL
            $entityManager->flush();

            // Redirection vers la page de connection une fois le nouveau compte créé
            return $this->redirectToRoute('app_login');
        }

        return $this->render(
            'security/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
