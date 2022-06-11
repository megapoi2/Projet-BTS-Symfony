<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{

    #[Route('/my', name: 'app_my')]
    public function index(): Response
    {
        return $this->render('my/index.html.twig', [
            'controller_name' => 'MyController',
        ]);
    }
    #[Route('/fournisseurs', name: 'fournisseurs')]
    public function fournisseurs(CallApiService $callApiService): Response
    {

        return $this->render('my/fournisseurs.html.twig', [
            'data' => $callApiService->getFournisseursData(),
        ]);
    }

    #[Route('/adherents', name: 'adherents')]
    public function adherents(CallApiService $callApiService,Request $request): Response
    {
        if($request->request->count() > 0) {
            
            $callApiService->createAdherent($request->request->get('adsociete'),
            $request->request->get('adcivilite'),
            $request->request->get('adnom'),
            $request->request->get('adprenom'),
            $request->request->get('ademail'),
            $request->request->get('addate'),
            $request->request->get('adactif'));
        }

        return $this->render('my/adherents.html.twig', [
            'data' => $callApiService->getAdherentsData(),
        ]);
    }

    #[Route('/produits', name: 'produits')]
    public function produits(CallApiService $callApiService): Response
    {
    
        return $this->render('my/produits.html.twig', [
            'data' => $callApiService->getProduitsData(),
        ]);
    }

    #[Route('/', name: 'home')]
    public function home() {
        return $this->render('my/home.html.twig');
    }
}
