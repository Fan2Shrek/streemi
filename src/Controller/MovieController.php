<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/movie')]
final class MovieController extends AbstractController
{
    #[Route('/details')]
    public function details(): Response
    {
        return $this->render('movie/detail.html.twig');
    }

    #[Route('/list')]
    public function list(): Response
    {
        return $this->render('movie/list.html.twig');
    }

    #[Route('/category')]
    public function category(): Response
    {
        return $this->render('movie/category.html.twig');
    }

    #[Route('/tv-shows')]
    public function tvShowDetail(): Response
    {
        return $this->render('movie/detail_tv_show.html.twig');
    }

    #[Route('/discover')]
    public function discover(): Response
    {
        return $this->render('movie/discover.html.twig');
    }
}
