<?php

declare(strict_types=1);

namespace App\User\Repository\FindUser;

use App\Repository\CommandHandler;
use App\Repository\CommandInterface;
use App\Repository\ImplementationTypes;
use App\User\Repository\FindUser\InMemory\FindUserCommandHandler;

#[CommandHandler(ImplementationTypes::IN_MEMORY, FindUserCommandHandler::class)]
#[CommandHandler(ImplementationTypes::DOCTRINE, Doctrine\FindUserCommandHandler::class)]
final class FindUserCommand implements CommandInterface
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}