<?php

namespace App\Controller;

use App\Controller\FrontController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PartnerRepository;

/**
 * Creates complementary views
 * @Route(name="information_")
 */
class InformationController extends FrontController
{
    /**
     * Displays informations about Mobilean
     * @Route("/a-propos-de-nous", name="about")
     * @return Response
     */
    public function about(): Response
    {
        return $this->render('front/information/about.html.twig');
    }

    /**
     * Displays legal notices
     * @Route("/mentions-legales", name="legal")
     * @return Response
     */
    public function legal(): Response
    {
        return $this->render('front/information/legal.html.twig');
    }
}
