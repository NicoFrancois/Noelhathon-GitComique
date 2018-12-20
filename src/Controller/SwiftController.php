<?php

namespace App\Controller;

use App\Entity\Satisfaction;
use App\Form\SatisfactionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SwiftController extends AbstractController
{
    /**
     * @Route("/swift", name="swift")
     */
    public function index(Request $request,\Swift_Mailer $swift_Mailer): Response
    {
        /*$message = (new \Swift_Message('Hello Email'))
            ->setFrom('cop.labo@gmail.com')
            ->setTo('tom.guibard@outlook.fr')
            ->setBody($this->renderView( 'emailQuestion/satisfaction.html.twig'), 'text/html');*/


        // $swift_Mailer->send($message);


        $startUp = new Satisfaction();
        $form = $this->createForm(SatisfactionType::class, $startUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($startUp);
            $entityManager->flush();

            return $this->redirectToRoute('start_up_index');
        }

        return $this->render('emailQuestion/satisfaction.html.twig', [
            'controller_name' => 'SwiftController',
            'form' => $form->createView()
        ]);
    }
}
