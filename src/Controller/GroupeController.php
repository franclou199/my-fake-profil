<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Repository\GroupeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupeController extends AbstractController
{
    #[Route('/groupe', name: 'app_groupe')]
    public function index(GroupeRepository $repository): Response
    {
        $group = $repository->findAll();
        return $this->render('groupe/index.html.twig', [
            'groupe' => $group
        ]);
    }

    #[Route('/groupe/{id}', name: 'groupe_id')]
    public function show(Groupe $group): Response
    {
        return $this->render('groupe/groupeIdUser.html.twig', [
            'groupe' => $group->getUtilisateurs()
        ]);
    }
}
