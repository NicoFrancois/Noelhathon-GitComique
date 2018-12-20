<?php

namespace App\Controller;

use App\Entity\EditionService;
use App\Form\EditionServiceType;
use App\Repository\EditionServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/edition/service")
 */
class EditionServiceController extends AbstractController
{
    /**
     * @Route("/", name="edition_service_index", methods={"GET"})
     */
    public function index(EditionServiceRepository $editionServiceRepository): Response
    {
        return $this->render('edition_service/index.html.twig', ['edition_services' => $editionServiceRepository->findAll()]);
    }

    /**
     * @Route("/new", name="edition_service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $editionService = new EditionService();
        $form = $this->createForm(EditionServiceType::class, $editionService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($editionService);
            $entityManager->flush();

            return $this->redirectToRoute('edition_service_index');
        }

        return $this->render('edition_service/new.html.twig', [
            'edition_service' => $editionService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="edition_service_show", methods={"GET"})
     */
    public function show(EditionService $editionService): Response
    {
        return $this->render('edition_service/show.html.twig', ['edition_service' => $editionService]);
    }

    /**
     * @Route("/{id}/edit", name="edition_service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EditionService $editionService): Response
    {
        $form = $this->createForm(EditionServiceType::class, $editionService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('edition_service_index', ['id' => $editionService->getId()]);
        }

        return $this->render('edition_service/edit.html.twig', [
            'edition_service' => $editionService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="edition_service_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EditionService $editionService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$editionService->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($editionService);
            $entityManager->flush();
        }

        return $this->redirectToRoute('edition_service_index');
    }
}
