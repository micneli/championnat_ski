<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Categorie;
use App\Entity\Participant;

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
              $manager->persist($categorie);
          }
        }

        $manager->flush();
    }
}
