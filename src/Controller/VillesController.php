<?php

namespace App\Controller;

use App\Repository\VillesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VillesController extends AbstractController
{
    #[Route('/villes', name: 'app_villes')]
    public function index(VillesRepository $repository): Response
    {
        $villes = $repository->findAll();
        return $this->render('villes/index.html.twig', [
            'villes' => $villes
        ]);
    }
}