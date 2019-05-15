<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Facture;

class FactureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // for ($i = 1; $i <= 8; $i++){
        //     $facture = new Facture();
        //     $facture->setCompteur("Type du compteur")
        //             ->setNumCompteur("00156484578QV")
        //             ->setNumAbn("Numero d'abonne")
        //             ->setNumPolice("Numero de police")
        //             ->setFactPeriod(new \DateTime())
        //             ->setClient("test")
        //             ->setNumFacture("2011 002458796")
        //             ->setCreatedAt(new \DateTime())
        //             ->setMontant(4802)
        //             ->setSociety("soneb");

        //     $manager->persist($facture);
        // }

        $manager->flush();
    }
}
