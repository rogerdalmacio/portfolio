<?php

namespace App\Observers;

use App\Models\Project;
use App\Service\TechStackService;

class ProjectObserver
{

    protected $techStackService;

    public function __construct(TechStackService $techStackService)
    {
        $this->techStackService = $techStackService;
    }

    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $this->techStackService->createTechStack($project->tech_stack);
    }
}
