<?php

namespace App\DataFixtures;


use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
       $traobject = new Traobject();
       $traobject->setTitle("Clés de voiture")
                ->setPicture(null)
                ->setAddress(null)
                ->setCity("Rennes")
                ->setCounty($this->getReference("county-3"))
                ->setDescription("Clés de voiture Renault avec porte-clés drapeau breton")
                ->setEventAt(new \DateTime("2018-11-20"))
                ->setDateEnd(null)
                ->setCategory($this->getReference("categorie-clé"))
                ->setUser($this->getReference("user-1"))
                ->setState($this->getReference("perdu"));

       $manager->persist($traobject);

        $traobject = new Traobject();
        $traobject->setTitle("Portefeuille cuir")
            ->setPicture(null)
            ->setAddress(null)
            ->setCity("Rostrenen")
            ->setCounty($this->getReference("county-1"))
            ->setDescription("Portefeuille noir en cuir de la marque Parfois")
            ->setEventAt(new \DateTime("2018-10-29"))
            ->setDateEnd(null)
            ->setCategory($this->getReference("categorie-portefeuille"))
            ->setUser($this->getReference("user-2"))
            ->setState($this->getReference("perdu"));

        $manager->persist($traobject);

        $traobject = new Traobject();
        $traobject->setTitle("Trousseau de clés")
            ->setPicture(null)
            ->setAddress(null)
            ->setCity("Lorient")
            ->setCounty($this->getReference("county-4"))
            ->setDescription("trousseau de clé de différentes couleurs")
            ->setEventAt(new \DateTime("2018-11-25"))
            ->setDateEnd(null)
            ->setCategory($this->getReference("categorie-clé"))
            ->setUser($this->getReference("user-3"))
            ->setState($this->getReference("perdu"));
        $manager->persist($traobject);

        $traobject = new Traobject();
        $traobject->setTitle("Poupée blonde")
            ->setPicture(null)
            ->setAddress(null)
            ->setCity("Brest")
            ->setCounty($this->getReference("county-2"))
            ->setDescription("Poupée blonde avec une robe rose et blanche à fleurs")
            ->setEventAt(new \DateTime("2018-10-29"))
            ->setDateEnd(null)
            ->setCategory($this->getReference("categorie-jouet"))
            ->setUser($this->getReference("user-1"))
            ->setState($this->getReference("trouvé"));
        $manager->persist($traobject);

        $traobject = new Traobject();
        $traobject->setTitle("Gants en cuir")
            ->setPicture(null)
            ->setAddress(null)
            ->setCity("Bruz")
            ->setCounty($this->getReference("county-3"))
            ->setDescription("Pair de gants homme en cuir marron")
            ->setEventAt(new \DateTime("2018-09-29"))
            ->setDateEnd(null)
            ->setCategory($this->getReference("categorie-autre"))
            ->setUser($this->getReference("user-2"))
            ->setState($this->getReference("trouvé"));
        $manager->persist($traobject);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [UserFixtures::class, StateFixtures::class, CategoryFixtures::class, CountyFixtures::class];
    }
}