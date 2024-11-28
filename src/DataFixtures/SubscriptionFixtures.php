<?php

namespace App\DataFixtures;

use App\Entity\Subscription;

final class SubscriptionFixtures extends AbstractFixtures
{
    public function getEntityClass(): string
    {
        return Subscription::class;
    }

    public function getData(): iterable
    {
        yield [
            'name' => 'Abonnement de ouf',
            'price' => 12,
            'duration' => 1,
        ];

        yield [
            'name' => 'Abonnement de base',
            'price' => 5,
            'duration' => 1,
        ];

        yield [
            'name' => 'Abonnement de luxe',
            'price' => 20,
            'duration' => 1,
        ];

        yield [
            'name' => 'Abonnement de test',
            'price' => 1,
            'duration' => 1,
        ];
    }
}
