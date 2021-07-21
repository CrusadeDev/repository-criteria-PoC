<?php

declare(strict_types=1);

namespace App\User\Repository\FindUser\Doctrine;

use App\User\Repository\FindUser\FindUserCriteria;
use App\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class FindUserCommandHandler
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function handle(FindUserCriteria $command): ?User
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('user');
        $qb->from(User::class, 'user');
        $qb->where($qb->expr()->eq('user.id', ':id'));
        $qb->setParameter('id', $command->getId());

        try {
            return $qb->getQuery()->getSingleResult();
        } catch (NonUniqueResultException $e) {
            throw new \LogicException($e->getMessage());
        } catch (NoResultException) {
            return null;
        }
    }
}