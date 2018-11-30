<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\State;
use App\Entity\Traobject;
use App\Form\TraobjectType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TraobjectController
 * @package App\Controller
 * @Route("/traobject")
 */
class TraobjectController extends BaseController
{

    /**
     * @Route("/newlost", name="traobject_newlost")
     * @param Request $request
     * @return Response
     */
    public function newLost(Request $request)
    {
        $stateLost = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::LOST]);

        //Création d'un nouveau Traobject
        $traobject = new Traobject();
        $traobject->setState($stateLost);

        $form = $this->createForm(TraobjectType::class, $traobject);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // Récupération de l'Entity Manager dans Doctrine
            $em = $this->getDoctrine()->getManager();
            // Ajout de l'objet dans l'Entity Manager
            $em->persist($traobject);
            //Exécution de la requête SQL
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('traobject/newlost.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/newfound", name="traobject_newfound")
     * @param Request $request
     * @return Response
     */
    public function newFound(Request $request)
    {
        $stateFound = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::FOUND]);

        $traobject = new Traobject();
        $traobject->setState($stateFound);

        $form = $this->createForm(TraobjectType::class, $traobject);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // Récupération de l'Entity Manager dans Doctrine
            $em = $this->getDoctrine()->getManager();
            // Ajout de l'objet dans l'Entity Manager
            $em->persist($traobject);
            //Exécution de la requête SQL
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('traobject/newfound.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/search", name="traobject_search")
     */
    public function  search(Traobject $traobject)
    {
        return $this->render('traobject/search.html.twig', ['traobject' => $traobject]);
    }

    /**
     * @Route("/{id}", name="traobject_show")
     */

    public function show(Traobject $traobject)
    {

        return $this->render('traobject/show.html.twig', [
            'traobject' => $traobject,
        ]);
    }

}
