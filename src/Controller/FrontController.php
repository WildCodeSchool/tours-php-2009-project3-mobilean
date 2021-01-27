<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PartnerRepository;
use App\Entity\Partner;

/**
 * Provides common features needed in front controllers
 */
abstract class FrontController extends AbstractController
{
    /**
     * @var Partner[]
     */
    protected array $partners;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partners = $partnerRepository->findAll();
    }

    /**
     * Renders a view with partners
     * @param mixed[] $parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters['partners'] = $this->partners;
        $content = $this->renderView($view, $parameters);

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($content);

        return $response;
    }
}
