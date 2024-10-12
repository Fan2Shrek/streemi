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
            'title' => 'Tenet',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'blablabla',
            'longDescription' => 'blablabla',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://upload.wikimedia.org/wikipedia/en/1/14/Tenet_movie_poster.jpg',
            'note' => 5.0,
            'staff' => ['Director' => 'John Doe'],
            'casting' => ['Actor' => 'Jane Doe'],
        ];

        yield [
            'title' => 'Batman',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'blabla 2',
            'longDescription' => 'truc',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://upload.wikimedia.org/wikipedia/en/1/1c/The_Dark_Knight_%282008_film%29.jpg',
            'note' => 6.5,
            'staff' => ['Director' => 'Patrick'],
            'casting' => ['Actor' => 'Jordan'],
        ];

        yield [
            'title' => 'Mario',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'Film bien',
            'longDescription' => 'En faite non',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://m.media-amazon.com/images/I/91zqGNzwk5L._AC_UF1000,1000_QL80_.jpg',
            'note' => 8.0,
            'staff' => ['Director' => 'Christophe'],
            'casting' => ['Actor' => 'Peut-être'],
        ];

        yield [
            'title' => 'John Wick',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'Film avec des images',
            'longDescription' => 'Vrai images et tout ca',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://m.media-amazon.com/images/I/81vZ6tNxuoL._SY500_.jpg',
            'note' => 7.8,
            'staff' => ['Director' => 'John Wick'],
            'casting' => ['Actor' => 'Moi'],
        ];

        yield [
            'title' => 'Matrix',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'Merci copilot pour tous ca',
            'longDescription' => '10 euros bien investie',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://m.media-amazon.com/images/I/613ypTLZHsL._AC_UF1000,1000_QL80_.jpg',
            'note' => 6.0,
            'staff' => ['Director' => 'John Wick'],
            'casting' => ['Actor' => 'Moi'],
        ];

        yield [
            'title' => 'Matrix 2',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'La la la',
            'longDescription' => 'Tous ca tu connais',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://www.ecranlarge.com/content/uploads/2022/10/4zvnfzujahplz7b42mkvjtel9wl-269.jpg',
            'note' => 6.7,
            'staff' => ['Director' => 'John Wick'],
            'casting' => ['Actor' => 'Moi'],
        ];

        yield [
            'title' => 'Matrix 3',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'Bonjour à tous',
            'longDescription' => 'Bla bla bla',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://fr.web.img6.acsta.net/medias/nmedia/18/35/14/64/18364977.jpg',
            'note' => 7.2,
            'staff' => ['Director' => 'John Wick'],
            'casting' => ['Actor' => 'Moi'],
        ];

        yield [
            'title' => 'Matrix 4',
            'mediaType' => MediaTypeEnum::MOVIE,
            'shortDescription' => 'Petit description',
            'longDescription' => 'Longue description',
            'releaseDate' => new \DateTime(),
            'coverImage' => 'https://fr.web.img4.acsta.net/pictures/21/11/17/17/24/3336846.jpg',
            'note' => 7.9,
            'staff' => ['Director' => 'John Wick'],
            'casting' => ['Actor' => 'Moi'],
        ];
    }
}
