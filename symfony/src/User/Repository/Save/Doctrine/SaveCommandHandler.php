<?php

declare(strict_types=1);

namespace App\User\Repository\Save\Doctrine;

use App\User\Repository\Save\SaveCommand;
use Doctrine\ORM\EntityManagerInterface;

class SaveCommandHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(SaveCommand $command): void
    {
        $this->entityManager->persist($command->getUser());
    }
}