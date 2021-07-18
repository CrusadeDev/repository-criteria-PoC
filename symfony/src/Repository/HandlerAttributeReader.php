<?php

declare(strict_types=1);

namespace App\Repository;

class HandlerAttributeReader
{
    public function readAttribute(string $className, string $type): string
    {
        try {
            $ref = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
            throw new \LogicException($e->getMessage());
        }

        $attr = $ref->getAttributes(CommandHandler::class);

        foreach ($attr as $attribute) {
            /** @var CommandHandler $instance */
            $instance = $attribute->newInstance();
            if ($instance->getType() === $type) {
                return $instance->getHandler();
            }
        }

        throw new \LogicException('Handler not found');
    }
}