<?php

declare(strict_types=1);

namespace App\User\Repository\Save;

use App\Repository\CommandHandler;
use App\Repository\CommandInterface;
use App\Repository\ImplementationTypes;
use App\User\Repository\Save\InMemory\SaveCommandHandler;
use App\User\User;

#[CommandHandler(ImplementationTypes::IN_MEMORY, SaveCommandHandler::class)]
#[CommandHandler(ImplementationTypes::DOCTRINE, Doctrine\SaveCommandHandler::class)]
final class SaveCommand implements CommandInterface
{
    public function __construct(private User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}