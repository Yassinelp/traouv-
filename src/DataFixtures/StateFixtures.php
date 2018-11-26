<?php

namespace App\DataFixtures;


use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $perdu = new State();
        $perdu->setLabel("Perdu")
            ->setColor("orange");
        $manager->persist($perdu);
        $this->addReference("perdu", $perdu);

        $trouve= new State();
        $trouve->setLabel("Trouvé")
            ->setColor("violet");
        $manager->persist($trouve);
        $this->addReference("trouvé", $trouve);

        $manager->flush();
    }

}