<?php

declare(strict_types=1);

namespace App\User\Repository;

use App\Repository\CriteriaInterface;
use App\Repository\HandlerFinder;
use App\User\Repository\Save\SaveCommand;
use App\User\User;

class UserRepositoryInMemory implements UserRepositoryInterface
{
    /**
     * @param HandlerFinder<User> $handlerFinder
     */
    public function __construct(private HandlerFinder $handlerFinder)
    {
    }

    /**
     * @inheritDoc
     */
    public function find(CriteriaInterface $command): ?User
    {
        return $this->handlerFinder->findAndCallInMemoryHandler($command);
    }

    public function save(User $user): void
    {
        $this->handlerFinder->findAndCallInMemoryHandler(new SaveCommand($user));
    }

    public function transactional(\Closure $closure): void
    {
        $closure();
    }
}