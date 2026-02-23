<?php

namespace App\Dashboard\Infrastructure\Repository;

use App\Dashboard\Domain\Entity\Dashboard;
use App\Dashboard\Domain\Repository\DashboardRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineDashboardRepository implements DashboardRepositoryInterface
{
    public function __construct(private EntityManagerInterface $em) {}

    public function save(Dashboard $dashboard): void
    {
        $this->em->persist($dashboard);
        $this->em->flush();
    }

    public function find(string $id): ?Dashboard
    {
        return $this->em->getRepository(Dashboard::class)->find($id);
    }
}
