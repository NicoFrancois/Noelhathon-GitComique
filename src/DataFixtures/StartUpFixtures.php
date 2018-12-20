<?php

namespace App\DataFixtures;

use App\Entity\StartUp;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;


class StartUpFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('FR_fr');

        for($i=1; $i<10; $i++){

            $startUp = new StartUp();
            $startUp->setNomEntreprise($faker->sentence(mt_rand(1,2)))
                    ->setNomDirigeant($faker->name())
                    ->setAdresse($faker->address())
                    ->setFondationDate($faker->dateTimeBetween('-11 months'))
                    ->setSiretNumber($faker->numberBetween($min = 1000000, $max = 9000000))
                    ->setWorkerNumber($faker->numberBetween($min = 1, $max = 10))
                    ->setActivity($faker->word())
                    ->setIntellectualProperty($faker->sentence(mt_rand(1,2)));
    ;
    $manager->persist($startUp);
        }

        $manager->flush();
    }
}
