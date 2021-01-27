<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\LegalMention;
use App\Form\LegalMentionType;
use App\Repository\LegalMentionRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminLegalController extends AbstractController
{
    /**
     * Show all legal mentions
     * @Route("/mentions-legales", name="legal")
     */
    public function legalMentions(LegalMentionRepository $legalRepository): Response
    {
        return $this->render('admin/legal_mentions.html.twig', [
            'legalMentions' => $legalRepository->findAll(),
        ]);
    }

    /**
     * Displays the page to add a new legal mention
     * @Route("/mention-legale/ajouter", name="legal_new", methods={"GET","POST"})
     * @return Response
     */
    public function newLegalMention(Request $request, EntityManagerInterface $manager): Response
    {
        $legalMention = new LegalMention();
        $form = $this->createForm(LegalMentionType::class, $legalMention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($legalMention);

            $manager->flush();

            return $this->redirectToRoute('admin_legal');
        }

        return $this->render('admin/legal_mention_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Displays the page view legal mention details
     * @Route("/mention-legale/{id}", name="legal_show", methods={"GET"})
     * @return Response
     */
    public function showLegalMention(LegalMention $legalMention): Response
    {
        return $this->render('admin/legal_mention_show.html.twig', [
            'legalMention' => $legalMention,
        ]);
    }

    /**
     * Provides access to the page to modify a legal mention
     * @Route("/mention-legale/modifier/{id}", name="legal_edit", methods={"GET","POST"})
     * @return Response
     */
    public function editLegalMention(
        Request $request,
        LegalMention $legalMention,
        EntityManagerInterface $manager
    ): Response {
        $form = $this->createForm(LegalMentionType::class, $legalMention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($legalMention);

            $manager->flush();

            return $this->redirectToRoute('admin_legal');
        }

        return $this->render('admin/legal_mention_edit.html.twig', [
            'legalMention' => $legalMention,
            'form' => $form->createView(),
        ]);
    }


    /**
     * Deletes a legal mention
     * @Route("/mention-legale/supprimer/{id}", name="legal_delete", methods={"DELETE"})
     * @return Response
     */
    public function deleteLegalMention(
        Request $request,
        LegalMention $legalMention,
        EntityManagerInterface $manager
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $legalMention->getId(), $request->request->get('_token'))) {
            $manager->remove($legalMention);

            $manager->flush();
        }

        return $this->redirectToRoute('admin_legal');
    }
}
