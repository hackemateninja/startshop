<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController
{
    #[Route(path: '/', name: 'home')]
    public function homepage(): Response
    {
        return new Response('<strong>Start shop</strong>', 200);
    }
}
