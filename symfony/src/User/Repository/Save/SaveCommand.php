<?php

declare(strict_types=1);

namespace App\User\Repository\Save;

use App\Repository\CriteriaHandler;
use App\Repository\CriteriaInterface;
use App\Repository\ImplementationTypes;
use App\User\Repository\Save\InMemory\SaveCommandHandler;
use App\User\User;

#[CriteriaHandler(ImplementationTypes::IN_MEMORY, SaveCommandHandler::class)]
#[CriteriaHandler(ImplementationTypes::DOCTRINE, Doctrine\SaveHandler::class)]
final class SaveCommand implements \App\User\Repository\CommandInterface
{
    public function __construct(private User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}