<?php

namespace App\Dashboard\Application\Query;

class GetDashboardQuery
{
    public function __construct(public readonly string $id) {}
}
