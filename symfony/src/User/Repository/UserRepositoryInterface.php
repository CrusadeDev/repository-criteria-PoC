<?php

declare(strict_types=1);

namespace App\User\Repository;

use App\Repository\CommandInterface;
use App\User\User;

interface UserRepositoryInterface
{
    public function find(CommandInterface $command): ?User;

    public function save(User $user): void;

    public function transactional(\Closure $closure): void;
}