<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $user = new User();
         //les valeurs!

         $user->setNom('Samba')
         ->setPrenom('Drame')
         ->setPlainPassword('passer123')
         ->setEmail('samba@gmail.com')
         ->setRoles(['admin'])
         ->setUsername('samba');

        $manager->persist($user);

        $manager->flush();
    }
}
