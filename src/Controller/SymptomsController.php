<?php

namespace App\Controller;

use App\Entity\Symptoms;
use App\Form\SymptomsType;
use App\Repository\SymptomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/symptoms")
 */
class SymptomsController extends AbstractController
{
    /**
     * @Route("/", name="symptoms_index", methods={"GET"})
     */
    public function index(SymptomsRepository $symptomsRepository): Response
    {
        return $this->render('symptoms/index.html.twig', [
            'symptoms' => $symptomsRepository->findOneByIdJoinedToCategory(),
        ]);
    }

    /**
     * @Route("/new", name="symptoms_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $symptom = new Symptoms();
        $form = $this->createForm(SymptomsType::class, $symptom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($symptom);
            $entityManager->flush();

            return $this->redirectToRoute('symptoms_index');
        }

        return $this->render('symptoms/new.html.twig', [
            'symptom' => $symptom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="symptoms_show", methods={"GET"})
     */
    public function show(Symptoms $symptom): Response
    {
        return $this->render('symptoms/show.html.twig', [
            'symptom' => $symptom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="symptoms_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Symptoms $symptom): Response
    {
        $form = $this->createForm(SymptomsType::class, $symptom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('symptoms_index', [
                'id' => $symptom->getId(),
            ]);
        }

        return $this->render('symptoms/edit.html.twig', [
            'symptom' => $symptom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="symptoms_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Symptoms $symptom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$symptom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($symptom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('symptoms_index');
    }
}