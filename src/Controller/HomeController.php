<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        if ($this->getUser()) {
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }

        return $this->redirectToRoute("app_login");
    }
}