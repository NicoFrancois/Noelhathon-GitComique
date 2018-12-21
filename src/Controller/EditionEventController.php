<?php

namespace App\Controller;

use App\Entity\EditionEvent;
use App\Form\EditionEventType;
use App\Repository\EditionEventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/edition/event")
 */
class EditionEventController extends AbstractController
{
    /**
     * @Route("/", name="edition_event_index", methods={"GET"})
     */
    public function index(EditionEventRepository $editionEventRepository): Response
    {
        return $this->render('edition_event/index.html.twig', ['edition_events' => $editionEventRepository->findAll()]);
    }

    /**
     * @Route("/new", name="edition_event_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $editionEvent = new EditionEvent();
        $form = $this->createForm(EditionEventType::class, $editionEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($editionEvent);
            $entityManager->flush();

            return $this->redirectToRoute('edition_event_index');
        }

        return $this->render('edition_event/new.html.twig', [
            'edition_event' => $editionEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/repQuestion", name="edition_event_repQuestion", methods={"GET"})
     */
    public function tableAnalyse(EditionEventRepository $editionEventRepository): Response
    {
        return $this->render('edition_event/chipo.html.twig', ['edition_events' => $editionEventRepository->findAll()]);
    }
    /**
     * @Route("/{id}", name="edition_event_show", methods={"GET"})
     */
    public function show(EditionEvent $editionEvent): Response
    {
        return $this->render('edition_event/show.html.twig', ['edition_event' => $editionEvent]);
    }

    /**
     * @Route("/{id}/edit", name="edition_event_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EditionEvent $editionEvent): Response
    {
        $form = $this->createForm(EditionEventType::class, $editionEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('edition_event_index', ['id' => $editionEvent->getId()]);
        }

        return $this->render('edition_event/edit.html.twig', [
            'edition_event' => $editionEvent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="edition_event_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EditionEvent $editionEvent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$editionEvent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($editionEvent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('edition_event_index');
    }
}
