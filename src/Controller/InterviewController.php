<?php

namespace App\Controller;

use App\Repository\AreaRepository;
use App\Repository\DiseaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class InterviewController extends AbstractController
{
    /**
     * @Route("/", name="interview_index", methods={"GET"})
     */
    public function index(AreaRepository $areaRepository): Response
    {
        return $this->render('interview/index.html.twig', [
            'areas' => $areaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/details", name="interview_details", methods={"GET"})
     */
    public function process(Request $request, DiseaseRepository $diseaseRepository): Response
    {
        $ids = $request->get('sympthoms');
        $em = $this->getDoctrine()->getManager();

        $query = 'SELECT * FROM disease WHERE ID in (select disease_id from disease_symptoms where symptoms_id is not null)';

        for ($i = 0; $i < count($ids); $i++)
        {
            $query .= ' and ID in (select disease_id from disease_symptoms where symptoms_id = ' . $ids[$i] . ') ';
        }
        $query .= 'order by probability DESC ';
        $statement = $em->getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        return $this->render('interview/disease.html.twig', [
            'diseases' => $result,
            'amount' => count($ids),
        ]);
    }
}
