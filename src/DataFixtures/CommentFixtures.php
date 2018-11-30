<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setContent("Bonjour, j'ai vu quelqu'un ramasser des clés le jour où vous l'avez perdu ... je crois qu'il les as déposé dans une boîte aux lettres de La Poste, je vous conseille d'aller verifier")
                ->setCreatedAt(new \DateTime("2018-11-20"))
                ->setUser($this->getReference("user-2"))
                ->setTraobject($this->getReference("traobject-1"));

        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("Je ne sais pas du tou à qui ça appartient !!! mais pas à moi en tout cas")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-1"))
            ->setTraobject($this->getReference("traobject-2"));

        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("C'est à moi je crois ... pouvez-vous me répondre je vous ai envoyé un message privé")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-2"))
            ->setTraobject($this->getReference("traobject-2"));


        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("Super ce site, j'ai retrouvé mon chat ! continuez à posté ce que vous avez perdu ou trouvé !! ")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-2"))
            ->setTraobject($this->getReference("traobject-3"));

        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("Moi je veux bien si personne ne réclame ... j'ai des cadeaux de Noël à faire !")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-1"))
            ->setTraobject($this->getReference("traobject-4"));

        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("C'est pas fini les cartes pokémon? c'est sur PokémonGo maintenant ! on est en 2018 les gars !!!")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-2"))
            ->setTraobject($this->getReference("traobject-5"));

        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("Ah ils ont l'air neufs en plus !")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-3"))
            ->setTraobject($this->getReference("traobject-6"));

        $manager->persist($comment);

        $comment = new Comment();
        $comment->setContent("Ah ! Ceci est un commentaire qui ne sert à rien ... à part à vérifier que les commentaires s'affichent bien")
            ->setCreatedAt(new \DateTime(""))
            ->setUser($this->getReference("user-2"))
            ->setTraobject($this->getReference("traobject-7"));

        $manager->persist($comment);

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [UserFixtures::class, TraobjectFixtures::class];
    }
}
