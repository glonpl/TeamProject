<?php

namespace App\Controller;

use App\Repository\AreaRepository;
use App\Repository\DiseaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/disease")
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
        /*$em = $this->getDoctrine()->getManager();

        $RAW_QUERY = 'SELECT * FROM  where my_table.field = 1 LIMIT 5;';

        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();

        $result = $statement->fetchAll();*/
        dd($ids);

        $disease = $diseaseRepository->getDiseaseByIds($ids);

        return $this->render('interview/disease.html.twig', [
            'disease' => $disease,
        ]);
    }
}
