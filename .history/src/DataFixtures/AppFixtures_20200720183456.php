<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
       $this->encoder=$encoder; 
    }
    public function load(ObjectManager $manager)
    {
         $user = new User();

         //les valeurs!
         $user->setNom('Samba')
         ->setPrenom('Drame')
         ->setPassword($this->encoder->encodePassword('sambadrame'))
         ->setEmail('samba@gmail.com')
         ->setRoles(['admin'])
         ->setUsername('samba');

        $manager->persist($user);

        $manager->flush();
    }
}
