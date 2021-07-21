<?php

declare(strict_types=1);

namespace App\User\Repository\Save\InMemory;

use App\User\Repository\Save\SaveCommand;
use App\User\Repository\UserStore;

class SaveCommandHandler
{
    public function __construct(private UserStore $userDao)
    {
    }

    public function handle(SaveCommand $command): void
    {
        $this->userDao->addUser($command->getUser());
    }
}