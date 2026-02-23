<?php

namespace App\Dashboard\UI\Controller;

use App\Dashboard\Application\Query\GetDashboardQuery;
use App\Dashboard\Infrastructure\Projection\DashboardReadModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Dashboard\Infrastructure\Messaging\SyncMessageBus; 
use App\Dashboard\Application\Command\CreateDashboardCommand;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends AbstractController
{
    #[Route('/dashboard/{id}', name: 'dashboard_index', methods: ['GET'])]
    public function index(string $id, DashboardReadModel $readModel)
    {
        // $data = $readModel->get($id, fn() => ['records' => range(1, 100000)]);
        // return $this->json($data);

        // Render Twig template instead of JSON 
        $data = $readModel->get($id, fn() => ['records' => range(1, 100000)]);
        return $this->render('dashboard/index.html.twig', [ 'dashboardId' => $id, 'records' => $data['records'], ]);
    }

    #[Route('/dashboard-records/{id}', name: 'dashboard_records', methods: ['GET'])]
    public function records(string $id, Request $request, DashboardReadModel $readModel)
    {
        // Simulate 100,000 records 
        $allRecords = $readModel->get($id, fn() => range(1, 100000));

        // Pagination parameters 
        $page = max(1, (int)$request->query->get('page', 1));
        $limit = 50; // records per page 
        $offset = ($page - 1) * $limit; 
        
        // Slice records for current page 
        $records = array_slice($allRecords['records'], $offset, $limit); 
        // echo $offset;
        // echo '<br>';
        // echo $limit;
        // echo '<br>';
        // dd($records);
        
        // Calculate total pages 
        $totalPages = (int)ceil(count($allRecords['records']) / $limit); 
        
        return $this->render('dashboard/records.html.twig', 
            [ 'dashboardId' => $id, 
            'records' => $records, 
            'page' => $page, 
            'totalPages' => $totalPages, 
            ]);
    }

    public function create(SyncMessageBus $syncBus): JsonResponse 
    { 
        $command = new CreateDashboardCommand('123', ['foo' => 'bar']); 
        $syncBus->dispatch($command); 
        return $this->json(['status' => 'Dashboard created synchronously']); 
    }
}
