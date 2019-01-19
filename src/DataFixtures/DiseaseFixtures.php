<?php

namespace App\DataFixtures;
use App\Entity\Area;
use App\Entity\Disease;
use App\Entity\Symptoms;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DiseaseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Disease
        $disease = new Disease();
        $disease->setName("Grypa");
        $disease->setDescription("Poważne wirusowe zakażenie dróg oddechowych");
        $disease->setProbability(200);
       // $disease->addRelationWithSymptom(17)
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Zatrucie pokarmowe");
        $disease->setDescription("Coś Ci zaszkodziło.");
        $disease->setProbability(220);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Uraz Nogi");
        $disease->setDescription("Udaj się do szpitala na rtg.");
        $disease->setProbability(190);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Uraz Ręki");
        $disease->setDescription("Udaj się do szpitala na rtg.");
        $disease->setProbability(190);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Naciągnięty mięsień");
        $disease->setDescription("Trzymaj obolałe miejsce w ciepłym.");
        $disease->setProbability(250);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Zla dieta");
        $disease->setDescription("Zastanów się nad trybem  życia i dietą.");
        $disease->setProbability(300);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Migrena");
        $disease->setDescription("Udaj się do specjalisty.");
        $disease->setProbability(180);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Przemęczenie");
        $disease->setDescription("Odpocznij.");
        $disease->setProbability(300);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Nerwoból");
        $disease->setDescription("Odpocznij, ogranicz stres.");
        $disease->setProbability(300);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Zapalenie ucha");
        $disease->setDescription("Udaj się do Lekarza.");
        $disease->setProbability(200);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Depresja");
        $disease->setDescription("Udaj się do Lekarza.");
        $disease->setProbability(200);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Przeziębienie");
        $disease->setDescription("Wygrzej się.");
        $disease->setProbability(300);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Choroba skóry");
        $disease->setDescription("Udaj się do dermatologa.");
        $disease->setProbability(200);
        $manager->persist($disease);

        $disease = new Disease();
        $disease->setName("Nieznana");
        $disease->setDescription("Nie znaleziono w bazie, Udaj się do szpitala.");
        $disease->setProbability(1);
        $manager->persist($disease);

        $manager->flush();



    }
}
