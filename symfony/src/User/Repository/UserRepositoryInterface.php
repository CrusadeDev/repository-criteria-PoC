<?php

declare(strict_types=1);

namespace App\User\Repository;

use App\Repository\CriteriaInterface;
use App\Repository\Exception\ConnectionException;
use App\User\User;

interface UserRepositoryInterface
{
    /**
     * @throws ConnectionException
     */
    public function find(CriteriaInterface $command): ?User;

    /**
     * @throws ConnectionException
     */
    public function save(User $user): void;

    /**
     * @throws ConnectionException
     */
    public function transactional(\Closure $closure): void;
}