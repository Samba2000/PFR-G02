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
         $user->setNom('Samba');
         $user->setPrenom('Drame');
         $user->setPlainPassword('passer123');
         $user->setEmail('samba@gmail.com');
         $user->setRoles(['admin']);
         $user->setUsername('samba');
        $manager->persist($user);

        $manager->flush();
    }
}
