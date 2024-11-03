<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidV7Generator;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid_binary", unique: true)]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: UuidV7Generator::class)]
    private ?UuidInterface $id = null;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }
}
