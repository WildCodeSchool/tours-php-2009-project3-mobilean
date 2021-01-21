<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\VehicleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicle;
use App\Form\VehicleType;
use App\Entity\RefillStation;
use App\Form\RefillStationType;
use App\Repository\RefillStationRepository;
use App\Service\FileManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use FilesystemIterator;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * Displays the page home administrator
     * @Route(name="home")
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('admin/home.html.twig');
    }

    /**
     * Displays the page with the all vehicles
     * @Route("/vehicules", name="vehicles")
     * @return Response
     */
    public function vehicles(VehicleRepository $vehicleRepository): Response
    {
        return $this->render('admin/vehicle_list.html.twig', [
            'vehicles' => $vehicleRepository->findAll(),
        ]);
    }

    /**
     * Displays the page with the all charging-stations
     * @Route("/bornes-de-recharge", name="charging_stations")
     * @return Response
     */
    public function chargingStations(RefillStationRepository $refillRepository): Response
    {
        return $this->render('admin/charging_stations.html.twig', [
            'refillStations' => $refillRepository->findAll(),
        ]);
    }

    /**
     * Displays the page for a quote request
     * @Route("/demandes-de-devis", name="estimates")
     * @return Response
     */
    public function estimates(): Response
    {
        $estimates = new FilesystemIterator('assets/estimates');
        return $this->render('admin/estimates.html.twig', [
            'estimates' => $estimates,
        ]);
    }

    /**
     * Displays the page for a partnership request
     * @Route("/demandes-de-partenariat", name="partners")
     * @return Response
     */
    public function partners(): Response
    {
        $partners = new FilesystemIterator('assets/partners');

        return $this->render('admin/partners.html.twig', [
            'partners' => $partners,
        ]);
    }

    /**
     * Deletes a partner pdf
     * @Route("/demande-de-partenariat/{filename}/supprimer", name="delete_partner")
     * @return Response
     */
    public function deletePartner(FileManager $fileManager, string $filename): Response
    {
        $fileManager->deletePDF('assets/partners/' . urldecode($filename));
        return $this->redirectToRoute('admin_partners');
    }

    /**
     * Deletes an estimate pdf
     * @Route("/demande-de-devis/{filename}/supprimer", name="delete_estimate")
     * @return Response
     */
    public function deleteEstimate(FileManager $fileManager, string $filename): Response
    {
        $fileManager->deletePDF('assets/estimates/' . urldecode($filename));
        return $this->redirectToRoute('admin_estimates');
    }

    /**
     * Deletes a contact pdf
     * @Route("/demande-informations/{filename}/supprimer", name="delete_contact")
     * @return Response
     */
    public function deleteContact(FileManager $fileManager, string $filename): Response
    {
        $fileManager->deletePDF('assets/contact/' . urldecode($filename));
        return $this->redirectToRoute('admin_home');
    }
}
