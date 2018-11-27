<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cle = new Category();
        $cle->setLabel("Clé")
            ->setColor("#7eb4f6")
            ->setIcon("fa-key");
        $manager->persist($cle);
        $this->addReference("categorie-clé", $cle);

        $portefeuille = new Category();
        $portefeuille->setLabel("Portefeuille")
                        ->setColor("#24bc01")
                        ->setIcon("fa-money");
        $manager->persist($portefeuille);
        $this->addReference("categorie-portefeuille", $portefeuille);

        $jouet = new Category();
        $jouet->setLabel("Jouet")
                ->setColor("#ff9d27")
                ->setIcon("fa-gamepad");
        $manager->persist($jouet);
        $this->addReference("categorie-jouet", $jouet);

        $autre = new Category();
        $autre->setLabel("Autre")
                ->setColor("#cbcbcb")
                ->setIcon("fa-question-circle");
        $manager->persist($autre);
        $this->addReference("categorie-autre", $autre);

        $manager->flush();
    }
}
