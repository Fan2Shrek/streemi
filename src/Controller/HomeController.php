<?php

namespace App\Controller;

use App\Enum\MediaTypeEnum;
use App\Repository\MediaRepository;
use App\Repository\SubscriptionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    #[Route('/home')]
    public function home(
        MediaRepository $mediaRepository,
        #[MapQueryParameter] int $page = 0,
    ): Response
    {
        $limit = 9;
        $films = $mediaRepository->findBy(['mediaType' => MediaTypeEnum::MOVIE], limit: $limit, offset: $page * $limit);

        return $this->render('index.html.twig', [
            'films' => $films,
            'page' => $page,
            'limit' => $limit,
        ]);
    }

    #[Route('/abonnements', name: 'abonnements')]
    public function abonnements(
        SubscriptionRepository $subscriptionRepository,
    ): Response
    {
        return $this->render('abonnements.html.twig', [
            'subscriptions' => $subscriptionRepository->findAll(),
        ]);
    }
}
