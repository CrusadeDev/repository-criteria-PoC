<?php

declare(strict_types=1);

namespace App\User\Repository\FindUser;

use App\Repository\CriteriaHandler;
use App\Repository\CriteriaInterface;
use App\Repository\ImplementationTypes;
use App\User\Repository\FindUser\InMemory\FindUserCommandHandler;

#[CriteriaHandler(ImplementationTypes::IN_MEMORY, FindUserCommandHandler::class)]
#[CriteriaHandler(ImplementationTypes::DOCTRINE, Doctrine\FindUserCommandHandler::class)]
final class FindUserCriteria implements CriteriaInterface
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}