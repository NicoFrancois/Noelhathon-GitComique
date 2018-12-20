<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SwiftController extends AbstractController
{
    /**
     * @Route("/swift", name="swift")
     */
    public function index(\Swift_Mailer $swift_Mailer): Response
    {
        /*$message = (new \Swift_Message('Hello Email'))
            ->setFrom('cop.labo@gmail.com')
            ->setTo('tom.guibard@outlook.fr')
            ->setBody($this->renderView( 'emailQuestion/satisfaction.html.twig'), 'text/html');*/


        // $swift_Mailer->send($message);

        return $this->render('emailQuestion/satisfaction.html.twig', [
            'controller_name' => 'SwiftController',
        ]);
    }
}
