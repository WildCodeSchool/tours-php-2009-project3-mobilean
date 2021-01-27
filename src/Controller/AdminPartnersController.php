<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Partner;
use App\Form\CurrentPartnerType;
use App\Repository\PartnerRepository;
use App\Service\FileManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminPartnersController extends AbstractController
{
    /**
     * Show all current partners
     * @Route("/partenaires", name="current_partners")
     */
    public function currentPartner(PartnerRepository $partnerRepository): Response
    {
        return $this->render('admin/current_partners.html.twig', [
            'partners' => $partnerRepository->findAll(),
        ]);
    }

    /**
     * Displays the page to add a new partner
     * @Route("/partenaire/ajouter", name="current_partner_new", methods={"GET","POST"})
     * @return Response
     */
    public function newCurrentPartner(Request $request, EntityManagerInterface $manager): Response
    {
        $partner = new Partner();
        $form = $this->createForm(CurrentPartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($partner);

            $manager->flush();

            return $this->redirectToRoute('admin_current_partners');
        }

        return $this->render('admin/current_partner_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays the page view partner details
     * @Route("/partenaire/{id}", name="current_partner_show", methods={"GET"})
     * @return Response
     */
    public function showCurrentPartner(Partner $partner): Response
    {
        return $this->render('admin/current_partner_show.html.twig', [
            'partner' => $partner,
        ]);
    }

    /**
     * Provides access to the page to modify a partner's informations
     * @Route("/partenaire/modifier/{id}", name="current_partner_edit", methods={"GET","POST"})
     * @return Response
     */
    public function editCurrentPartner(
        Request $request,
        Partner $partner,
        EntityManagerInterface $manager
    ): Response {
        $form = $this->createForm(CurrentPartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($partner);

            $manager->flush();

            return $this->redirectToRoute('admin_current_partners');
        }

        return $this->render('admin/current_partner_edit.html.twig', [
            'partner' => $partner,
            'form' => $form->createView(),
        ]);
    }


    /**
     * Deletes a partner
     * @Route("/partenaire/supprimer/{id}", name="current_partner_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteCurrentPartner(
        Request $request,
        Partner $partner,
        EntityManagerInterface $manager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $partner->getId(), $request->request->get('_token'))) {
            $manager->remove($partner);

            $manager->flush();
        }

        return $this->redirectToRoute('admin_current_partners');
    }
}
