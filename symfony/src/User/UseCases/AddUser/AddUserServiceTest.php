<?php

declare(strict_types=1);

namespace App\User\UseCases\AddUser;

use App\User\Repository\FindUser\FindUserCommand;
use App\User\Repository\UserRepositoryInterface;
use App\User\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AddUserServiceTest extends KernelTestCase
{
    public function test_handle_shouldThrowExceptionIfUserExists(): void
    {
        $id = 1;
        $this->addUserToRepository($id);
        $this->expectException(\Error::class);
        self::getContainer()->get(AddUserService::class)->handle($id);
    }

    public function test_handle_shouldSaveUser_WhenDoesNotExists(): void
    {
        $id = 1;
        self::getContainer()->get(AddUserService::class)->handle($id);

        $result = self::getContainer()->get(UserRepositoryInterface::class)->find(new FindUserCommand($id));

        self::assertNotNull($result);
    }

    private function addUserToRepository(int $id): void
    {
        self::getContainer()->get(UserRepositoryInterface::class)->save(new User($id));
    }
}
