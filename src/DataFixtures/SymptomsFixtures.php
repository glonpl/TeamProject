<?php

namespace App\DataFixtures;
use App\Entity\Symptoms;
use App\Entity\Area;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SymptomsFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return array(
            AreaFixtures::class,
        );
    }
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $legs_area = $manager->getRepository(Area::class)->getAreaById(1);
        $hands_area = $manager->getRepository(Area::class)->getAreaById(2);
        $head_area = $manager->getRepository(Area::class)->getAreaById(3);
        $corpse_area = $manager->getRepository(Area::class)->getAreaById(4);
        $overall_area = $manager->getRepository(Area::class)->getAreaById(5);
        $skin_area = $manager->getRepository(Area::class)->getAreaById(6);

        //Symptoms
        $symptoms = new Symptoms();
        $symptoms->setName("Ból");
        $symptoms->setFKArea($legs_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Obrzęk");
        $symptoms->setFKArea($legs_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Skurcze");
        $symptoms->setFKArea($legs_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Ból");
        $symptoms->setFKArea($hands_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Obrzęk");
        $symptoms->setFKArea($hands_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Skurcze");
        $symptoms->setFKArea($hands_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Osrty Ból");
        $symptoms->setFKArea($head_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Ból");
        $symptoms->setFKArea($head_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Ból ucha");
        $symptoms->setFKArea($head_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Ból brzucha");
        $symptoms->setFKArea($corpse_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Ból w klatce");
        $symptoms->setFKArea($corpse_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Wzdęcia");
        $symptoms->setFKArea($corpse_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Temperatura pow.37.7");
        $symptoms->setFKArea($overall_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Złe samopoczucie");
        $symptoms->setFKArea($overall_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Kaszel");
        $symptoms->setFKArea($overall_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Nudności");
        $symptoms->setFKArea($overall_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Obolałe mięśnie");
        $symptoms->setFKArea($overall_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Wysypka");
        $symptoms->setFKArea($skin_area);
        $manager->persist($symptoms);

        $symptoms = new Symptoms();
        $symptoms->setName("Swędzenie");
        $symptoms->setFKArea($skin_area);
        $manager->persist($symptoms);

        $manager->flush();
    }
}
