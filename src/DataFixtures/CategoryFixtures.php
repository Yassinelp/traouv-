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
            ->setColor("bleu")
            ->setIcon("fa-key");
        $manager->persist($cle);
        $this->addReference("categorie-clé", $cle);

        $portefeuille = new Category();
        $portefeuille->setLabel("Portefeuille")
                        ->setColor("green")
                        ->setIcon("fa-money");
        $manager->persist($portefeuille);
        $this->addReference("categorie-portefeuille", $portefeuille);

        $jouet = new Category();
        $jouet->setLabel("Porte feuille")
                ->setColor("red")
                ->setIcon("fa-gamepad");
        $manager->persist($jouet);
        $this->addReference("categorie-jouet", $jouet);

        $autre = new Category();
        $autre->setLabel("Autre")
                ->setColor("grey")
                ->setIcon("fa");
        $manager->persist($autre);
        $this->addReference("categorie-autre", $autre);

        $manager->flush();
    }
}
