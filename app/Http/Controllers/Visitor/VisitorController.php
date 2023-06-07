<?php

namespace App\Http\Controllers\Visitor;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Service\ProjectService;
use App\Http\Controllers\Controller;
use App\Service\VisitorCounterService;
use App\Http\Resources\ProjectResource;

class VisitorController extends Controller
{
    protected $service;
    protected $visitorCounterService;

    public function __construct(ProjectService $service, VisitorCounterService $visitorCounterService)
    {
        $this->service = $service;
        $this->visitorCounterService = $visitorCounterService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->service->lists($request);

        $resourceData = ProjectResource::collection($data);

        return Inertia::render('Visitors/Index', [
            'projects' => $resourceData
        ]);
    }

    /**
     * count unique visitors
     * @param int $id
     * @return void
     */
    public function countVisitor(int $id)
    {
        $this->visitorCounterService->countProjectVisitor($id);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
