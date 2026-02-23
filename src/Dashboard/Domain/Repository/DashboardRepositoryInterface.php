<?php

namespace App\Dashboard\Domain\Repository;

use App\Dashboard\Domain\Entity\Dashboard;

interface DashboardRepositoryInterface
{
    /**
     * Persist a Dashboard aggregate.
     *
     * @param Dashboard $dashboard
     */
    public function save(Dashboard $dashboard): void;

    /**
     * Find a Dashboard by its ID.
     *
     * @param string $id
     * @return Dashboard|null
     */
    public function find(string $id): ?Dashboard;

    /**
     * Remove a Dashboard aggregate.
     *
     * @param Dashboard $dashboard
     */
    // public function remove(Dashboard $dashboard): void;
}
