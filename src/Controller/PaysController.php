<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Repository\PaysRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaysController extends AbstractController
{
    #[Route('/pays', name: 'app_pays')]
    public function index(PaysRepository $repository): Response
    {
        $pays = $repository->findAll();

        return $this->render('pays/index.html.twig', [
            'pays' => $pays
        ]);
    }

    #[Route('/pays/{id', name:'pays_id')]
    public function show(Pays $pays): Response
    {
        return $this->render('pays/paysId.html.twig', [
            'pays' => $pays
        ]);
    }
}
