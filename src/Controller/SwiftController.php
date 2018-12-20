<?php

namespace App\Controller;

use App\Entity\Satisfaction;
use App\Form\SatisfactionType1;
use App\Form\SatisfactionType2Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class SwiftController extends AbstractController
{
    /**
     * @Route("/questionary1", name="questionary1", methods={"GET","POST"})
     */
    public function formulaire1(Request $request, Session $session): Response
    {
        $startUp = new Satisfaction();
        $form = $this->createForm(SatisfactionType1::class, $startUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $session->set('form-data', $form->getData());

            return $this->redirectToRoute('questionary2');
        }

        return $this->render('emailQuestion/satisfaction.html.twig', [
            'controller_name' => 'SwiftController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/questionary2", name="questionary2", methods={"GET","POST"})
     */
    public function formulaire2(Request $request, Session $session): Response
    {
        $startUp = new Satisfaction();
        $form = $this->createForm(SatisfactionType2Type::class, $startUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $data = $session->get('form-data');
            $startUp->setSatisfactionRatio($data->getSatisfactionRatio());
            $startUp->setAmelioration($data->getAmelioration());
            $startUp->setEventElarge($data->getEventElarge());
            $startUp->setContact($data->getContact());
            $startUp->setExistance($data->getExistance());
            $startUp->setComment($data->getComment());
            $entityManager->persist($startUp);
            $entityManager->flush();

            return $this->redirectToRoute('cimer');
        }

        return $this->render('emailQuestion/satisfaction2.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/merci", name="cimer")
     */
    public function merci(): Response
    {
        return $this->render('emailQuestion/satisfaction.html.twig', [
            'controller_name' => 'SwiftController',
        ]);
    }
}
