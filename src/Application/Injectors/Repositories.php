<?php

declare(strict_types=1);

namespace Application\Injectors;

use Doctrine\ORM\EntityManagerInterface;
use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Infrastructure\Persistence\Repositories\TaskRepository;
use Psr\Container\ContainerInterface;

final class Repositories
{
    /**
     * Injects repositories into the container definitions.
     *
     * @return mixed[]
     */
    public function __invoke(): array
    {
        return [
            TaskRepositoryInterface::class => function($container) {
                $entityManager = $container->get(EntityManagerInterface::class);

                return new TaskRepository($entityManager);
            },
        ];
    }
}
