<?php

declare(strict_types=1);

namespace App\User\Repository;

use App\User\User;

class UserDao
{
    /**
     * @property array<int, User>
     */
    private array $users = [];

    /**
     * @return array<int, User>
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    public function addUser(User $user): void
    {
        $this->users[] = $user;
    }
}