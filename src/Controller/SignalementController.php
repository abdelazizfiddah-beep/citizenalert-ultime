<?php

namespace App\Controller;

use App\Entity\Signalement;
use App\Form\SignalementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SignalementController extends AbstractController
{
    #[Route('/signalement/new', name: 'app_signalement_new')]
    #[IsGranted('ROLE_USER')] // Seuls les connectés peuvent poster
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $signalement = new Signalement();
        $form = $this->createForm(SignalementType::class, $signalement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On lie l'utilisateur connecté au signalement
            $signalement->setAuteur($this->getUser());
            
            $em->persist($signalement);
            $em->flush();
            
            return $this->redirectToRoute('app_signalement_index');
        }

        return $this->render('signalement/new.html.twig', ['form' => $form]);
    }

    #[Route('/signalement', name: 'app_signalement_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $signalements = $em->getRepository(Signalement::class)->findAll();
        return $this->render('signalement/index.html.twig', ['signalements' => $signalements]);

    }
    #[Route('/signalement/{id}', name: 'app_signalement_show', methods: ['GET'])]
    public function show(Signalement $signalement): Response
    {
        return $this->render('signalement/show.html.twig', [
            'signalement' => $signalement,
        ]);
    }

}
