<?php

namespace App\Dashboard\Application\Command;

class CreateDashboardCommand
{
    public function __construct(
        public readonly string $id,
        public readonly array $data
    ) {}
}
