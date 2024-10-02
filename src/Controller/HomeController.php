<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    #[Route('/home')]
    public function home(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/upload')]
    public function upload(): Response
    {
        return $this->render('upload.html.twig');
    }

    #[Route('/abonnements')]
    public function abonnements(): Response
    {
        return $this->render('abonnements.html.twig');
    }
}
