<?php

declare(strict_types=1);

namespace App\User\Repository\FindUser\InMemory;

use App\User\Repository\FindUser\FindUserCommand;
use App\User\Repository\UserDao;
use App\User\User;

class FindUserCommandHandler
{
    public function __construct(private UserDao $repository)
    {
    }

    public function handle(FindUserCommand $command): ?User
    {
        $users = $this->repository->getUsers();

        foreach ($users as $user) {
            if ($user->getId() !== $command->getId()) {
                continue;
            }

            return $user;
        }

        return null;
    }
}