<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Category;

final class CategoryFixtures extends AbstractFixtures
{
    public function getEntityClass(): string
    {
        return Category::class;
    }

    public function getData(): iterable
    {
        yield [
            'nom' => 'Action',
            'label' => 'Action',
        ];

        yield [
            'nom' => 'Adventure',
            'label' => 'Adventure',
        ];

        yield [
            'nom' => 'Comedy',
            'label' => 'Comedy',
        ];

        yield [
            'nom' => 'Drama',
            'label' => 'Drama',
        ];
    }
}

