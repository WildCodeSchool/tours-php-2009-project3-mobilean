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
        try {
            $estimates = new FilesystemIterator('assets/estimates');
        } catch (\Exception $e) {
            $estimates = [];
        }

        try {
            $partners = new FilesystemIterator('assets/partners');
        } catch (\Exception $e) {
            $partners = [];
        }

        try {
            $contacts = new FilesystemIterator('assets/contact');
        } catch (\Exception $e) {
            $contacts = [];
        }

        return $this->render('admin/home.html.twig', [
            'estimates' => $estimates,
            'partners' => $partners,
            'contacts' => $contacts,
        ]);
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
     * Displays the page for quotes requests
     * @Route("/demandes-de-devis", name="estimates")
     * @return Response
     */
    public function estimates(): Response
    {
        try {
            $estimates = new FilesystemIterator('assets/estimates');
        } catch (\Exception $e) {
            $estimates = [];
        }

        return $this->render('admin/estimates.html.twig', [
            'estimates' => $estimates,
        ]);
    }

    /**
     * Displays the page for partnership requests
     * @Route("/demandes-de-partenariat", name="partners")
     * @return Response
     */
    public function partners(): Response
    {
        try {
            $partners = new FilesystemIterator('assets/partners');
        } catch (\Exception $e) {
            $partners = [];
        }

        return $this->render('admin/partners.html.twig', [
            'partners' => $partners,
        ]);
    }

    /**
     * Displays the page for information requests
     * @Route("/demandes-informations", name="contact")
     * @return Response
     */
    public function contact(): Response
    {
        try {
            $contacts = new FilesystemIterator('assets/contact');
        } catch (\Exception $e) {
            $contacts = [];
        }

        return $this->render('admin/contact.html.twig', [
            'contacts' => $contacts,
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
