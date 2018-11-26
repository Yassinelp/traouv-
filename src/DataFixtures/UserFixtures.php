<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname("Yassine")
            ->setLastname("Le Poul")
            ->setEmail("lepoulyassine@gmail.com")
            ->setPassword($this->passwordEncoder->encodePassword($admin, "ylepoul"))
            ->setPicture("avatar.jpg")
            ->setPhone("0686477329")
            ->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        $this->addReference("user-1", $admin);

        $user = new User();
        $user->setFirstname("Jean")
            ->setLastname("Dupont")
            ->setEmail("dupontjean@gmail.com")
            ->setPassword($this->passwordEncoder->encodePassword($user, '1234'))
            ->setPicture("jean.jpg")
            ->setPhone("0605040302")
            ->setRoles(["ROLE_USER"]);
        $manager->persist($user);
        $this->addReference("user-2", $user);

        $user = new User();
        $user->setFirstname("John")
            ->setLastname("Doe")
            ->setEmail("johndoe@gmail.com")
            ->setPassword($this->passwordEncoder->encodePassword($user, '1234'))
            ->setPicture("john.jpg")
            ->setPhone("0607080910")
            ->setRoles(["ROLE_USER"]);
        $manager->persist($user);
        $this->addReference("user-3", $user);

        $manager->flush();
    }
}