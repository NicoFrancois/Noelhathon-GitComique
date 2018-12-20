<?php

namespace App\Controller;

use App\Entity\InternalPartner;
use App\Form\InternalPartnerType;
use App\Repository\InternalPartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/internal/partner")
 */
class InternalPartnerController extends AbstractController
{
    /**
     * @Route("/", name="internal_partner_index", methods={"GET"})
     */
    public function index(InternalPartnerRepository $internalPartnerRepository): Response
    {
        return $this->render('internal_partner/index.html.twig', array('internal_partners'
        => $internalPartnerRepository->findBy(
            [],
                ['name' =>'ASC'])
            ));
    }

    /**
     * @Route("/new", name="internal_partner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $internalPartner = new InternalPartner();
        $form = $this->createForm(InternalPartnerType::class, $internalPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($internalPartner);
            $entityManager->flush();

            return $this->redirectToRoute('internal_partner_index');
        }

        return $this->render('internal_partner/new.html.twig', [
            'internal_partner' => $internalPartner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="internal_partner_show", methods={"GET"})
     */
    public function show(InternalPartner $internalPartner): Response
    {
        return $this->render('internal_partner/show.html.twig', ['internal_partner' => $internalPartner]);
    }

    /**
     * @Route("/{id}/edit", name="internal_partner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InternalPartner $internalPartner): Response
    {
        $form = $this->createForm(InternalPartnerType::class, $internalPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('internal_partner_index', ['id' => $internalPartner->getId()]);
        }

        return $this->render('internal_partner/edit.html.twig', [
            'internal_partner' => $internalPartner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="internal_partner_delete", methods={"DELETE"})
     */
    public function delete(Request $request, InternalPartner $internalPartner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$internalPartner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($internalPartner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('internal_partner_index');
    }
}
