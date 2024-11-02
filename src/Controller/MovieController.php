<?php

namespace App\Controller;

use App\Entity\Media;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/movie')]
final class MovieController extends AbstractController
{
    #[Route('/details/{id}', name: 'details')]
    public function details(Media $media): Response
    {
        return $this->render('movie/detail.html.twig', [
            'movie' => $media,
        ]);
    }

    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        return $this->render('movie/lists.html.twig');
    }

    #[Route('/category', name: 'category')]
    public function category(): Response
    {
        return $this->render('movie/category.html.twig');
    }

    #[Route('/tv-shows', name: 'tv_shows')]
    public function tvShowDetail(): Response
    {
        return $this->render('movie/detail_tv_show.html.twig');
    }

    #[Route('/discover', name: 'discover')]
    public function discover(): Response
    {
        return $this->render('movie/discover.html.twig');
    }

    public function getLastAddedToList(MediaRepository $mediaRepository, int $count = 3): Response
    {
        // $movies = $mediaRepository->findLastAddedToList($this->getUser(), $count);
        $movies = $mediaRepository->findBy([], limit: $count);


        return $this->render('components/_last-added-movie.html.twig', [
            'films' => $movies,
        ]);
    }
}
