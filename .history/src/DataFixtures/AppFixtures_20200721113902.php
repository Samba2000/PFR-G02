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

    $faker = Factory!
    public function load(ObjectManager $manager)
    {
         $role=['admin','cm','formateur'];
       for($i=0;$i<3;$i++)
       {
        $user = new User();
         //les valeurs!
         $user->setNom('Prenom'.$i)
         ->setPrenom('Nom'.$i)
         ->setPassword($this->encoder->encodePassword($user, 'passer123'))
         ->setEmail('email'.$i.'@gmail.com')
         ->setRoles([$role[$i]])
         ->setUsername('admin'.$i);
         
            $manager->persist($user);

       }
       $manager->flush();
       
    }
}