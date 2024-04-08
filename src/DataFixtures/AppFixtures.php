<?php


namespace App\DataFixtures;

use Faker;
use App\Entity\Groupe;
use App\Entity\Pays;
use App\Entity\Utilisateurs;
use App\Entity\Villes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

 //PaysData
        for ($i = 1; $i <= 15; $i++) {
        //Instanciation d'un nouveau pays
        $country = new Pays();
        $country->setNom($faker->country);
        $manager->persist($country);
        $this->addReference("country". $i, $country);
        }

 //VilleData
        for($i = 0; $i <= 20; $i++) {
        // Instanciation d'une nouvelle ville
        $city = new Villes();
        $city->setNom($faker->city);
        $id_country = $this->getReference("country".rand(1,14));
        $city->setPaysId($id_country);
        $manager->persist($city);
        $this->addReference("city". $i, $city);        
        }

// GroupeData
        for($i = 0; $i <= 5; $i++) {
        // Instanciation d'un nouveau Groupe
        $groupe = new Groupe();
        $groupe->setNom($faker->lastName);
        $manager->persist($groupe);
        $this->addReference("groupe". $i, $groupe);
    }


        // UserData
        for($i = 0; $i <= 50; $i++) {
        //Création d'une nouvelle instance de l'entity Users
        $user = new Utilisateurs();
        // Définition des propriétés de l'utilisiteur
        $user->setNom($faker->lastName)
        ->setPrenom($faker->firstName)
        ->setEmail($faker->email)
        ->setDateNaissance($faker->dateTime)
        ->setProfession($faker->jobTitle)
        ->setIntro($faker->realText(50))
        ->setDescription($faker->realText(200))
        ->setVilleId($this->getReference("city".rand(1,20)))
        ->addGroupeId($this->getReference("groupe".rand(0, 5)));
        $manager->persist($user);
        }

       

       

        
    //Envoie les données sur la base de données
    $manager->flush();
    //t'as intérêt à fonctionner
    //ça envoie que dalle (14h02)

}
}