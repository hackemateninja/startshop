<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route(path: '', name: 'apistarship', methods: ["GET"])]
    public function getCollection(StarshipRepository $starshipRepository): Response
    {
        $starships = $starshipRepository->findAll();

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ["GET"])]
    public function get(int $id, StarshipRepository $starshipRepository): Response
    {
				$startShip = $starshipRepository->find($id);

				if(!$startShip) {
					throw $this->createNotFoundException("Starship not found");
				}

       	return $this->json($startShip);
    }
}
