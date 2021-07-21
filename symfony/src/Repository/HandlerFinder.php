<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Exception\ConnectionException;
use App\Repository\Exception\ResultNotFoundException;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @template T
 */
class HandlerFinder
{
    public function __construct(private ContainerInterface $container, private HandlerAttributeReader $attributeReader)
    {
    }

    /**
     * @return ?T
     * @throws ConnectionException
     * @throws ResultNotFoundException
     */
    public function findAndCallInMemoryHandler(CriteriaInterface $command): ?object
    {

        $class = $command::class;

        $handlerClass = $this->attributeReader->readAttribute($class, ImplementationTypes::IN_MEMORY);

        $result = $this->container->get($handlerClass);

        if ($result === null) {
            throw new \LogicException('Handler not found');
        }

        return $result->handle($command);
    }

    /**
     * @return ?T
     * @throws ConnectionException
     * @throws ResultNotFoundException
     */
    public function findAndCallDoctrineHandler(CriteriaInterface $command): ?object
    {
        $class = $command::class;

        $handlerClass = $this->attributeReader->readAttribute($class, ImplementationTypes::DOCTRINE);

        $result = $this->container->get($handlerClass);

        if ($result === null) {
            throw new \LogicException('Handler not found');
        }

        return $result->handle($command);
    }
}