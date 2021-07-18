<?php

declare(strict_types=1);

namespace App\User\Repository;

use App\Repository\CommandInterface;
use App\Repository\Exception\ConnectionException;
use App\Repository\Exception\ResultNotFoundException;
use App\User\User;

interface UserRepositoryInterface
{
    /**
     * @throws ConnectionException
     * @throws ResultNotFoundException
     */
    public function find(CommandInterface $command): ?User;

    /**
     * @throws ConnectionException
     */
    public function save(User $user): void;

    /**
     * @throws ConnectionException
     */
    public function transactional(\Closure $closure): void;
}