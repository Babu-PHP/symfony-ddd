<?php

namespace App\Dashboard\Infrastructure\Projection;

use Symfony\Contracts\Cache\CacheInterface;
use Psr\Log\LoggerInterface;

class DashboardReadModel
{
    public function __construct(private CacheInterface $cache, private LoggerInterface $logger) {}

    public function get(string $id, callable $fetcher): array
    {
        // return $this->cache->get("dashboard_{$id}", function() use ($fetcher) {
        //     return $fetcher();
        // });

        // $start = microtime(true);
        // $result = $this->cache->get("dashboard_{$id}", fn() => $fetcher());
        // $this->logger->info("Dashboard {$id} fetched in " . (microtime(true) - $start) . " seconds");
        //  return $result;

        return $this->cache->get("dashboard_{$id}", function() use ($fetcher) {
            $this->logger->info("Dashboard {$id} fetched in " . (microtime(true) - $start) . " seconds");
            return ['records' => $fetcher()];
        });
    }
}
