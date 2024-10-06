<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/admin')]
final class AdminController extends AbstractController
{
    #[Route('/', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/users', name: 'admin_users')]
    public function users(): Response
    {
        return $this->render('admin/users.html.twig');
    }

    #[Route('/films', name: 'admin_films')]
    public function films(): Response
    {
        return $this->render('admin/films.html.twig');
    }

    #[Route('/films/add', name: 'admin_films_add')]
    public function addFilm(): Response
    {
        return $this->render('admin/add_films.html.twig');
    }

    #[Route('/upload', name: 'admin_upload')]
    public function upload(): Response
    {
        return $this->render('admin/upload.html.twig');
    }
}
