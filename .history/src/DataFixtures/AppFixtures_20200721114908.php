<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
   private $encoder;
   public function __construct(UserPasswordEncoderInterface $encoder)
   {
      $this->encoder = $encoder;
   }

   public function load(ObjectManager $manager)
   {
      $faker = Factory::Create('fr_FR');
      $role = ['admin', 'cm', 'formateur'];
      for ($i = 0; $i < 3; $i++) {
         $user = new User();
         //les valeurs!
         $user->setNom('Prenom' . $i)
            ->setPrenom('Nom' . $i)
            ->setPassword($this->encoder->encodePassword($user, 'passer123'))
            ->setEmail('email' . $i . '@gmail.com')
            ->setRoles([$role[$i]])
            ->setUsername('admin' . $i);

         $manager->persist($user);

         for ($i = 0; $i < 3; $i++) {
            $Profil = new Profil();
            //les valeurs!
            $Profil->setProfil('profil'.$i)
                   ->setUser($user);
                   
            $manager->persist($Profil);
      }
      
      $manager->flush();
   }
}