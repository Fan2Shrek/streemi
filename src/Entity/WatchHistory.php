<?php

namespace App\Entity;

use App\Repository\WatchHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WatchHistoryRepository::class)]
class WatchHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $lastWatched = null;

    #[ORM\Column]
    private ?int $numberOfView = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastWatched(): ?\DateTimeImmutable
    {
        return $this->lastWatched;
    }

    public function setLastWatched(\DateTimeImmutable $lastWatched): static
    {
        $this->lastWatched = $lastWatched;

        return $this;
    }

    public function getNumberOfView(): ?int
    {
        return $this->numberOfView;
    }

    public function setNumberOfView(int $numberOfView): static
    {
        $this->numberOfView = $numberOfView;

        return $this;
    }
}