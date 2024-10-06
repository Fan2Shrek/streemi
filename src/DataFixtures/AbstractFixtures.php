<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

abstract class AbstractFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $entity = new ($this->getEntityClass());

            foreach ($data as $property => $value) {
                $setter = 'set' . ucfirst($property);

                if (method_exists($entity, $setter)) {
                    $entity->$setter($value);
                }
            }

            $this->postInstantiate($entity);
            $manager->persist($entity);
        }

        $manager->flush();
    }

    protected function postInstantiate($entity): void {}

    abstract protected function getData(): iterable;

    abstract protected function getEntityClass(): string;
}
