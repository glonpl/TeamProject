<?php

namespace App\DataFixtures;
use App\Entity\Area;
use App\Entity\Disease;
use App\Entity\Symptoms;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class DiseaseFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return array(
            SymptomsFixtures::class,
        );
    }
    public function load(ObjectManager $manager)
    {
        //legs
        $legs_pain = $manager->getRepository(Symptoms::class)->getSymptomById(1);
        $legs_swollen = $manager->getRepository(Symptoms::class)->getSymptomById(2);
        $legs_shrink = $manager->getRepository(Symptoms::class)->getSymptomById(3);
        //hands
        $hands_pain = $manager->getRepository(Symptoms::class)->getSymptomById(4);
        $hands_swollen = $manager->getRepository(Symptoms::class)->getSymptomById(5);
        $hands_shrink = $manager->getRepository(Symptoms::class)->getSymptomById(6);
        //head
        $head_strong_pain = $manager->getRepository(Symptoms::class)->getSymptomById(7);
        $head_pain = $manager->getRepository(Symptoms::class)->getSymptomById(8);
        $head_ear_pain = $manager->getRepository(Symptoms::class)->getSymptomById(9);
        //corpse
        $corpse_stomach_pain = $manager->getRepository(Symptoms::class)->getSymptomById(10);
        $corpse_chest_pain = $manager->getRepository(Symptoms::class)->getSymptomById(11);
        $corpse_latulence = $manager->getRepository(Symptoms::class)->getSymptomById(12);
        //overall
        $overall_temperature = $manager->getRepository(Symptoms::class)->getSymptomById(13);
        $overall_bad_feel = $manager->getRepository(Symptoms::class)->getSymptomById(14);
        $overall_cough = $manager->getRepository(Symptoms::class)->getSymptomById(15);
        $overall_sickness = $manager->getRepository(Symptoms::class)->getSymptomById(16);
        $overall_sore_muscles = $manager->getRepository(Symptoms::class)->getSymptomById(17);
        //skin
        $skin_rash = $manager->getRepository(Symptoms::class)->getSymptomById(18);
        $skin_itch = $manager->getRepository(Symptoms::class)->getSymptomById(19);

        // Disease
        $disease = new Disease();
        $disease->setName("Grypa");
        $disease->setDescription("Poważne wirusowe zakażenie dróg oddechowych");
        $disease->setProbability(200);
        $disease->addRelationWithSymptom($overall_bad_feel);
        $disease->addRelationWithSymptom($overall_cough);
        $disease->addRelationWithSymptom($overall_sore_muscles);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Zatrucie pokarmowe");
        $disease->setDescription("Coś Ci zaszkodziło.");
        $disease->setProbability(220);
        $disease->addRelationWithSymptom($corpse_stomach_pain);
        $disease->addRelationWithSymptom( $overall_sickness);
        $disease->addRelationWithSymptom($overall_bad_feel);
        $disease->addRelationWithSymptom($corpse_latulence);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Uraz Nogi");
        $disease->setDescription("Udaj się do szpitala na rtg.");
        $disease->setProbability(190);
        $disease->addRelationWithSymptom($legs_pain);
        $disease->addRelationWithSymptom($legs_swollen);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Uraz Ręki");
        $disease->setDescription("Udaj się do szpitala na rtg.");
        $disease->setProbability(190);
        $disease->addRelationWithSymptom($hands_pain);
        $disease->addRelationWithSymptom($hands_swollen);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Naciągnięty mięsień nogi");
        $disease->setDescription("Trzymaj obolałe miejsce w ciepłym.");
        $disease->setProbability(250);
        $disease->addRelationWithSymptom($legs_pain);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Naciągnięty mięsień ręki");
        $disease->setDescription("Trzymaj obolałe miejsce w ciepłym.");
        $disease->setProbability(250);
        $disease->addRelationWithSymptom($hands_pain);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Zla dieta");
        $disease->setDescription("Zastanów się nad trybem  życia i dietą.");
        $disease->addRelationWithSymptom($hands_shrink);
        $disease->addRelationWithSymptom($legs_shrink);
        $disease->addRelationWithSymptom($overall_bad_feel);
        $disease->setProbability(300);


        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Migrena");
        $disease->setDescription("Udaj się do specjalisty.");
        $disease->setProbability(180);
        $disease->addRelationWithSymptom($head_strong_pain);
        $disease->addRelationWithSymptom($overall_sickness);
        $disease->addRelationWithSymptom($overall_bad_feel);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Przemęczenie");
        $disease->setDescription("Odpocznij.");
        $disease->setProbability(300);
        $disease->addRelationWithSymptom($overall_bad_feel);
        $disease->addRelationWithSymptom($head_pain);

        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Nerwoból");
        $disease->setDescription("Odpocznij, ogranicz stres.");
        $disease->setProbability(300);
        $disease->addRelationWithSymptom($overall_bad_feel);
        $disease->addRelationWithSymptom($corpse_chest_pain);

        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Zapalenie ucha");
        $disease->setDescription("Udaj się do Lekarza.");
        $disease->setProbability(200);
        $disease->addRelationWithSymptom($overall_temperature);
        $disease->addRelationWithSymptom($head_ear_pain);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Depresja");
        $disease->setDescription("Udaj się do Lekarza.");
        $disease->setProbability(200);
        $disease->addRelationWithSymptom($overall_bad_feel);

        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Przeziębienie");
        $disease->setDescription("Wygrzej się.");
        $disease->setProbability(300);
        $disease->addRelationWithSymptom($overall_temperature);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Choroba skóry");
        $disease->setDescription("Udaj się do dermatologa.");
        $disease->setProbability(200);
        $disease->addRelationWithSymptom($skin_itch);
        $disease->addRelationWithSymptom($skin_rash);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Nieznana");
        $disease->setDescription("Nie znaleziono w bazie, Udaj się do szpitala.");
        $disease->setProbability(1);
        $manager->persist($disease);

        $manager->flush();



    }
}
