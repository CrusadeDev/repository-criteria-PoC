<?php

declare(strict_types=1);

namespace App\User\Repository\FindUser\InMemory;

use App\User\Repository\FindUser\FindUserCriteria;
use App\User\Repository\UserStore;
use App\User\User;

class FindUserCommandHandler
{
    public function __construct(private UserStore $repository)
    {
    }

    public function handle(FindUserCriteria $command): ?User
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
