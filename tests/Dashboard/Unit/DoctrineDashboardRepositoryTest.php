<?php

namespace App\Tests\Dashboard\Unit;

use App\Dashboard\Domain\Entity\Dashboard;
use App\Dashboard\Infrastructure\Repository\DoctrineDashboardRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class DoctrineDashboardRepositoryTest extends TestCase
{
    public function testSaveDashboard(): void
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $em->expects($this->once())->method('persist');
        $em->expects($this->once())->method('flush');

        $repository = new DoctrineDashboardRepository($em);
        $dashboard = new Dashboard('123', ['foo' => 'bar']);

        $repository->save($dashboard);
    }
}
