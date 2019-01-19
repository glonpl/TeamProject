<?php

namespace App\DataFixtures;
use App\Entity\Area;
use App\Entity\Disease;
use App\Entity\Symptoms;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AreaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $legs_area = $manager->getRepository(Area::class)->getAreaById(1);
        $hands_area = $manager->getRepository(Area::class)->getAreaById(2);
        $head_area = $manager->getRepository(Area::class)->getAreaById(3);
        $corpse_area = $manager->getRepository(Area::class)->getAreaById(4);
        $overall_area = $manager->getRepository(Area::class)->getAreaById(5);
        $skin_area = $manager->getRepository(Area::class)->getAreaById(6);




        // Area
        $area = new Area();
        $area->setName('Nogi');
        $manager->persist($area);

        $area = new Area();
        $area->setName('Ręce');
        $manager->persist($area);

        $area = new Area();
        $area->setName('Głowa');
        $manager->persist($area);

        $area = new Area();
        $area->setName('Tułów');
        $manager->persist($area);

        $area = new Area();
        $area->setName('Ogólne');
        $manager->persist($area);

        $area = new Area();
        $area->setName('Skóra');
        $manager->persist($area);

        $manager->flush();



    }
}
