<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
	#[Route(path: '/', name: 'app_main_homepage')]
	public function homepage(StarshipRepository $repository, Request $request): Response
	{
		$ships = $repository->findIncomplete();
		$ships->setMaxPerPage(5);
		$ships->setCurrentPage($request->query->getInt('page', 1));

		$myShip = $repository->findMyShip();

		return $this->render('main/homepage.html.twig', [
			'myShip' => $myShip,
			'ships' => $ships,
		]);
	}
}
