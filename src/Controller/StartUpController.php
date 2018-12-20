<?php

namespace App\Controller;

use App\Entity\StartUp;
use App\Form\StartUpType;
use App\Repository\StartUpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/start/up")
 */
class StartUpController extends AbstractController
{
    /**
     * @Route("/", name="start_up_index", methods={"GET"})
     */
    public function index(StartUpRepository $startUpRepository): Response
    {
        return $this->render('start_up/index.html.twig', ['start_ups' => $startUpRepository->findAll()]);
    }

    /**
     * @Route("/new", name="start_up_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $startUp = new StartUp();
        $form = $this->createForm(StartUpType::class, $startUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($startUp);
            $entityManager->flush();

            return $this->redirectToRoute('start_up_index');
        }

        return $this->render('start_up/new.html.twig', [
            'start_up' => $startUp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="start_up_show", methods={"GET"})
     */
    public function show(StartUp $startUp): Response
    {
        return $this->render('start_up/show.html.twig', ['start_up' => $startUp]);
    }

    /**
     * @Route("/{id}/edit", name="start_up_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StartUp $startUp): Response
    {
        $form = $this->createForm(StartUpType::class, $startUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('start_up_index', ['id' => $startUp->getId()]);
        }

        return $this->render('start_up/edit.html.twig', [
            'start_up' => $startUp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="start_up_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StartUp $startUp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$startUp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($startUp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('start_up_index');
    }
}
