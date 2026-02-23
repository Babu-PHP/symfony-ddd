<?php

namespace App\Tests\Dashboard\Unit;

use App\Dashboard\Domain\Entity\Dashboard;
use PHPUnit\Framework\TestCase;

class DashboardTest extends TestCase
{
    public function testDashboardCreation(): void
    {
        $dashboard = new Dashboard('1', ['foo' => 'bar']);
        $this->assertEquals('1', $dashboard->id());
        $this->assertEquals(['foo' => 'bar'], $dashboard->data());
    }
}
