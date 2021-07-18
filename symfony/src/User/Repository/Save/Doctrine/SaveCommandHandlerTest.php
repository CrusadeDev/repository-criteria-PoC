<?php

namespace App\User\Repository\Save\Doctrine;

use App\User\Repository\Save\SaveCommand;
use App\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SaveCommandHandlerTest extends KernelTestCase
{
    private SaveCommandHandler $handler;
    private EntityManagerInterface $em;

    public function test_handle_ShouldSaveUserToDatabase(): void
    {
        $user = new User(1);

        $this->handler->handle(new SaveCommand($user));
        $this->em->flush();

        self::assertEquals(
            $user,
            $this->em->find(User::class, $user->getId())
        );
    }

    /** @noinspection PhpFieldAssignmentTypeMismatchInspection */
    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = self::getContainer()->get(SaveCommandHandler::class);
        $this->em = self::getContainer()->get(EntityManagerInterface::class);
        $this->em->beginTransaction();
    }

    protected function tearDown(): void
    {
        $this->em->rollback();
        parent::tearDown();
    }
}
