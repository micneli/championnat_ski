<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Categorie;
use App\Entity\Participant;
use App\Entity\Resultat;
use App\Entity\Competition;

class DemoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 0; $i < 4; $i++) {
          $categorie = new Categorie();
          $categorie->setNomCategorie('categorie'.$i);
          $manager->persist($categorie);
          for($j = 0; $j < 4; $j++) {
            $participant = new Participant();
            $participant->setNomParticipant('participant'.$j)
              ->setPrenomParticipant('prenom'.$j)
              ->addCategory($categorie);
              $manager->persist($participant);
          }
        }
        for($i = 0; $i < 4; $i++) {

          $time = \DateTime::createFromFormat('i:s.u','03:01.012345Z');

          $resultat= new Resultat();
          

          $resultat->setResultat1(new \DateTime())
          
            ->setResultat2(new \DateTime())
            ->setResultatFinal(new \DateTime());

          $manager->persist($resultat);
       
    }
    $manager->flush();
  }
    // public function loadResultat(ObjectManager $manager)
    // {
    //     $product = new Product();
    //     $manager->persist($product);

    //     for($i = 0; $i < 4; $i++) {

    //       $time = \DateTime::createFromFormat('i:s.u','01:02:03');

    //       $resultat= new Resultat();
          

    //       $resultat->$time->setResultat1(new \DateTime('01:02:03'))

    //         ->setResultat2(date('i:s.u').$i)
    //         ->setResultatFinal(date('i:s.u').$i);

    //       $manager->persist($resultat);

    //       for($j = 0; $j < 4; $j++) {
    //         $competition = new Competition();
    //         $competition->setCompetitions('competition'.$j)
    //           ->addCompetition($competition);
    //           $manager->persist($resultat);
    //       }
         
          
    //     }

    //     $manager->flush();
    // }

}
