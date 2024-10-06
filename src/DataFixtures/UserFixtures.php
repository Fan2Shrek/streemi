<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Enum\UserAccountStatusEnum;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends AbstractFixtures
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    ) {}

    protected function getEntityClass(): string
    {
        return User::class;
    }

    protected function getData(): iterable
    {
        yield [
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => 'aaa',
            'accountStatus' => UserAccountStatusEnum::VALID,
            'roles' => ['ROLE_ADMIN'],
        ];

        yield [
            'username' => 'user',
            'email' => 'user@test.com',
            'password' => 'aaa',
            'accountStatus' => UserAccountStatusEnum::VALID,
            'roles' => ['ROLE_USER'],
        ];
    }

    protected function postInstantiate($entity): void
    {
        $entity->setPassword($this->passwordHasher->hashPassword($entity, $entity->getPassword()));
    }
}
