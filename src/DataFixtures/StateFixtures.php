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
            ->setColor("#ff2727");
        $manager->persist($perdu);
        $this->addReference("perdu", $perdu);

        $trouve= new State();
        $trouve->setLabel("Trouvé")
            ->setColor("#24bc01");
        $manager->persist($trouve);
        $this->addReference("trouvé", $trouve);

        $manager->flush();
    }

}