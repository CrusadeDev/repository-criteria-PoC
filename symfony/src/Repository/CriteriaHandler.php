<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

declare(strict_types=1);

namespace App\Repository;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
class CriteriaHandler
{
    public function __construct(private string $type, private string $handler)
    {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getHandler(): string
    {
        return $this->handler;
    }
}