<?php

namespace App\Dashboard\Domain\Event;

class DashboardCreated
{
    public function __construct(
        public readonly string $id,
        public readonly array $data
    ) {}
}
