<?php

declare(strict_types=1);

namespace App\User;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class User
{
    public function __construct(#[Id, Column(type: 'integer')] private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}