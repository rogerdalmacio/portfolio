<?php

namespace App\Service;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\VisitorCounter;

class VisitorCounterService
{
    /**
     * Model object
     *
     * @var object
     */
    protected $model;
    protected $projectModel;

    /**
     * Class construct
     */
    public function __construct(VisitorCounter $model, Project $projectModel)
    {
        $this->model = $model;
        $this->projectModel = $projectModel;
    }

    public function incrementCounter(string $ip_address)
    {
        $this->model::firstOrCreate([
            'ip_address' => $ip_address,
        ]);
    }

    public function visitorCount()
    {
        return $this->model::count();
    }

    /**
     * count unique visitors
     * @param int $id
     * @return void
     */
    public function countProjectVisitor(int $id)
    {
        $this->projectModel = $this->projectModel->find($id);

        $this->projectModel->visitor_counter = $this->projectModel->visitor_counter + 1;

        $this->projectModel->save();
    }
}
