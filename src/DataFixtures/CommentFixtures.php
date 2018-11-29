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
