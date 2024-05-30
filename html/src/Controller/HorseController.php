<?php

namespace App\Controller;

use App\Entity\Horse;
use App\Form\Type\HorseFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HorseController extends AbstractController {

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(): Response {
        $horseList = $this->getDoctrine()->getRepository(Horse::class)->findAll();
        return $this->render('horselist.html.twig', [
            'horseList' => $horseList,
        ]);
    }

    /**
     * @Route("/horse/new", name="new_horse", methods={"GET", "POST"})
     */
    public function new_horse(Request $request): Response {
        $horse = new Horse();

        $form = $this->createForm(HorseFormType::class, $horse);

        $form->handleRequest($request); // put the form data into $horse or set the form not valid, not submitted, etc
        $error = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $horse = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($horse);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        } else if ($form->isSubmitted() && !$form->isValid()) {
            $error = "Sorry, there is a problem with the form.";
        }

        return $this->render('horseform.html.twig', [
            'error' => $error,
            'horseForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/horse/{id}/delete", name="delete_horse", methods={"GET"})
     */
    public function delete_horse(Request $request, int $id): Response {
        // Yes this should be methods=delete if we're doing an API but this is quick and dirty
        $horse = $this->getDoctrine()->getRepository(Horse::class)->find($id);
        $this->getDoctrine()->getRepository(Horse::class)->remove($horse);
        return $this->redirectToRoute('home');
    }


    /**
     * @Route("/horse/{id}", name="edit_horse", methods={"GET", "POST"})
     */
    public function edit_horse(Request $request, int $id): Response {
        $horse = $this->getDoctrine()->getRepository(Horse::class)->find($id);

        $form = $this->createForm(HorseFormType::class, $horse);

        $form->handleRequest($request); // put the form data into $horse or set the form not valid, not submitted, etc
        $error = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $horse = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($horse);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        } else if ($form->isSubmitted() && !$form->isValid()) {
            $error = "Sorry, there is a problem with the form.";
        }

        return $this->render('horseform.html.twig', [
            'error' => $error,
            'horseForm' => $form->createView(),
        ]);
    }

}
