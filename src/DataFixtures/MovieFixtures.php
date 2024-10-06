<?php

namespace App\DataFixtures;

use App\Entity\Media;
use App\Enum\MediaTypeEnum;

final class MovieFixtures extends AbstractFixtures
{
    protected function getEntityClass(): string
    {
        return Media::class;
    }

    protected function getData(): iterable
    {
        yield [
            'title' => 'Test movie',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'blablabla',
            'longDescription' => 'blablabla',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://upload.wikimedia.org/wikipedia/en/1/14/Tenet_movie_poster.jpg',
            'staff' => ['Director' => 'John Doe'],
            'casting' => ['Actor' => 'Jane Doe'],
        ];

        yield [
            'title' => 'Test movie 2',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'blabla 2',
            'longDescription' => 'truc',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://upload.wikimedia.org/wikipedia/en/1/1c/The_Dark_Knight_%282008_film%29.jpg',
            'staff' => ['Director' => 'Patrick'],
            'casting' => ['Actor' => 'Jordan'],
        ];

        yield [
            'title' => 'Test movie 3',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'Film bien',
            'longDescription' => 'En faite non',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://m.media-amazon.com/images/I/91zqGNzwk5L._AC_UF1000,1000_QL80_.jpg',
            'staff' => ['Director' => 'Christophe'],
            'casting' => ['Actor' => 'Peut-être'],
        ];
    }
}
