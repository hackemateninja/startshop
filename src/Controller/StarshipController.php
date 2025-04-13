<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipController extends AbstractController
{
    #[Route('/starship/{id<\d+>}', name: 'app_starship_show')]
    public function show(int $id, StarshipRepository $starshipRepository): Response
    {
        $ship = $starshipRepository->find($id);

        if (!$ship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->render('starship/show.html.twig', ['ship' => $ship]);
    }
}
