<?php

namespace App\Controller;

use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

#[Route('/room')]
final class RoomController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private HubInterface $hub,
    ) {
    }

    #[Route('/create', name: 'room_create')]
    public function create(): Response
    {
        return $this->render('room/create.html.twig');
    }

    #[Route('/generate', name: 'room_generate')]
    public function generate(): Response
    {
        $room = new Room();
        $this->entityManager->persist($room);
        $this->entityManager->flush();

        return $this->redirect($this->generateUrl('room', ['id' => $room->getId()]));
    }
    
    #[Route('/{id}', name: 'room')]
    public function room(Room $room): Response
    {
        $this->hub->publish(new Update(
            'http://example.com/rooms/' . $room->getId(),
            json_encode([
                'id' => $room->getId(),
                'user' => random_int(1, 100),
            ]),
        ));

        return $this->render('room/room.html.twig', ['room' => $room]);
    }
}
