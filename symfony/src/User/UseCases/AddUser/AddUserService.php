<?php

declare(strict_types=1);

namespace App\User\UseCases\AddUser;

use App\User\Repository\FindUser\FindUserCommand;
use App\User\Repository\UserRepositoryInterface;
use App\User\User;

class AddUserService
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function handle(int $id): void
    {
        $userExists = $this->repository->find(new FindUserCommand($id));

        if ($userExists !== null) {
            throw new \Error('User already exists');
        }

        $user = new User($id);
        $this->repository->transactional(fn() => $this->repository->save($user));
    }
}