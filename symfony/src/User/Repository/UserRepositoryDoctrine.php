<?php

declare(strict_types=1);

namespace App\User\Repository;

use App\Repository\CriteriaInterface;
use App\Repository\HandlerFinder;
use App\User\Repository\Save\SaveCommand;
use App\User\User;
use Doctrine\ORM\EntityManagerInterface;

class UserRepositoryDoctrine implements UserRepositoryInterface
{
    /**
     * @param HandlerFinder<User> $handlerFinder
     */
    public function __construct(private HandlerFinder $handlerFinder, private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @inheritDoc
     */
    public function find(CriteriaInterface $command): ?User
    {
        return $this->handlerFinder->findAndCallDoctrineHandler($command);
    }

    public function findMany(CriteriaInterface $command): array
    {
        return $this->handlerFinder->findAndCallDoctrineHandler($command);
    }

    public function save(User $user): void
    {
        $this->handlerFinder->findAndCallDoctrineHandler(new SaveCommand($user));
    }

    public function transactional(\Closure $closure): void
    {
        $this->entityManager->transactional($closure);
    }
}