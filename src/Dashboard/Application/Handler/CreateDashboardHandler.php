<?php

namespace App\Dashboard\Application\Handler;

use App\Dashboard\Application\Command\CreateDashboardCommand;
use App\Dashboard\Domain\Entity\Dashboard;
use App\Dashboard\Domain\Event\DashboardCreated;
use App\Dashboard\Domain\Repository\DashboardRepositoryInterface;
use App\Dashboard\Infrastructure\Messaging\AsyncMessageBus;

class CreateDashboardHandler
{
    public function __construct(
        private DashboardRepositoryInterface $repository,
        private AsyncMessageBus $asyncBus
    ) {}

    public function __invoke(CreateDashboardCommand $command): void
    {
        $dashboard = new Dashboard($command->id, $command->data);
        $this->repository->save($dashboard);

        // Dispatch event asynchronously 
        $this->asyncBus->dispatch(new DashboardCreated($dashboard->id(), $dashboard->data()));
    }
}
