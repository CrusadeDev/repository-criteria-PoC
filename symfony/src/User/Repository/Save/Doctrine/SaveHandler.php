<?php

declare(strict_types=1);

namespace App\User\Repository\Save\Doctrine;

use App\Repository\Exception\ConnectionException;
use App\User\Repository\Save\SaveCommand;
use Doctrine\ORM\EntityManagerInterface;

class SaveHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(SaveCommand $command): void
    {
        try {
            $this->entityManager->persist($command->getUser());
        } catch (\Exception $exception) {
            throw new ConnectionException($exception->getMessage());
        }
    }
}