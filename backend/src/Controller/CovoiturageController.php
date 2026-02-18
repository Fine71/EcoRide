<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchCovoiturageType;
use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class CovoiturageController extends AbstractController
{
    #[Route('/covoiturage', name: 'app_covoiturage')]
    public function index(): Response
    {
        return $this->render('covoiturage/index.html.twig', [
            'controller_name' => 'CovoiturageController',
        ]);
    }

    #[Route('/recherche', name:'app_covoiturage_recherche')]
    public function recherche(Request $request, CovoiturageRepository $repo): Response
    {
        $form= $this->createForm(SearchCovoiturageType::class);
        $form->handleRequest($request);

        $covoiturages = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $covoiturages = $repo->search($data);
        } else {
            $covoiturages = [];
        }

        return $this->render('covoiturage/recherche.html.twig', [
            'form' => $form->createView(),
            'covoiturages' => $covoiturages,
        ]);
    }
}
