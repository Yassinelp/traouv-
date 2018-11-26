<?php

namespace App\DataFixtures;


use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountyFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $county = new County();
        $county->setLabel("Côte d'Armor")
                ->setZipcode(22);
        $manager->persist($county);
        $this->addReference("county-1", $county);

        $county = new County();
        $county->setLabel("Finistère")
            ->setZipcode(29);
        $manager->persist($county);
        $this->addReference("county-2", $county);

        $county = new County();
        $county->setLabel("Ille-et-Vilaine")
            ->setZipcode(35);
        $manager->persist($county);
        $this->addReference("county-3", $county);

        $county = new County();
        $county->setLabel("Morbihan")
            ->setZipcode(56);
        $manager->persist($county);
        $this->addReference("county-4", $county);

        $manager->flush();
    }
}