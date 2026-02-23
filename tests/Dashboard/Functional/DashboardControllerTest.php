<?php

namespace App\Tests\Dashboard\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerTest extends WebTestCase
{
    public function testDashboardEndpoint(): void
    {
        $client = static::createClient();
        $client->request('GET', '/dashboard/123');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');
    }
}
