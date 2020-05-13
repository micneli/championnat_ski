<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Categorie;
use App\Entity\Participant;

// class DemoFixtures extends Fixture
// {
//     public function load(ObjectManager $manager)
//     {
//         // $product = new Product();
//         // $manager->persist($product);

//         for($i = 0; $i < 4; $i++) {
//           $categorie = new Categorie();
//           $categorie->setNomCategorie('categorie'.$i);
//           $manager->persist($categorie);
//           for($j = 0; $j < 4; $j++) {
//             $participant = new Participant();
//             $participant->setNomParticipant('participant'.$j)
//               ->setPrenomParticipant('prenom'.$j)
//               ->addCategory($categorie);
//               $manager->persist($participant);
//           }
//         }

//         $manager->flush();
//     }
use App\Entity\Resultat;
use App\Entity\Competition;

class DemoFixtures extends Fixture
{


  public function load(ObjectManager $manager)
  {

    for ($i = 0; $i < 4; $i++) { // boucle fixture catégorie
      $categorie = new Categorie();
      $categorie->setNomCategorie('categorie' . $i);
      $manager->persist($categorie);
      for ($j = 0; $j < 4; $j++) { // boucle fixture participant
        $participant = new Participant();
        $participant->setNomParticipant('participant' . $j)
          ->setPrenomParticipant('prenom' . $j)
          ->addCategory($categorie);
        $manager->persist($participant);


        for ($k = 0; $k < 4; $k++) { // boucle pour fixture competition

          $date = \DateTime::createFromFormat('j-M-Y', '15-Feb-2009'); // creation format date
      
          $competition = new Competition();
          $competition->setVilleCompetition('villeCompetition' . $k) //renvoie l'heure d'aujourd'hui

            ->setDateCompetition(new \DateTime());
     
          $manager->persist($competition);

          for ($l = 0; $l < 4; $l++) { // boucke pour fixture resultat

            $time = \DateTime::createFromFormat('i:s.u', '03:01.012345Z'); // creation format time

            $resultat = new Resultat();


            $resultat->setResultat1(new \DateTime()) // renvoie l'heure d'aujourd'hui

              ->setResultat2(new \DateTime())
              ->setResultatFinal(new \DateTime())
              ->setCompetitions($competition)
              ->setCategories($categorie)
              ->setParticipants($participant);

            $manager->persist($resultat);

          }
        }
      }
    }
    $manager->flush();
  }
}
