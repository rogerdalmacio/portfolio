<?php

namespace App\Service;

use App\Traits\Crud;
use App\Models\Project;
use App\Models\VisitorCounter;
use Illuminate\Http\Request;

class ProjectService
{
    use Crud;
    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    /**
     * List of Projects
     * Request $request
     */
    public function lists(Request $request)
    {
        return $this->getAllData($request, $request->paginate);
    }

    public function list(int $id)
    {
        return $this->getData($id);
    }

    /**
     * Create Project
     * Request $request
     */
    public function createProject(Request $request)
    {
        return $this->saveData(null, $request);
    }

    /**
     * edit Project
     * Request $request
     */
    public function editProject(int $id, Request $request)
    {
        return $this->saveData($id, $request);
    }

    /**
     * delete Project
     * Request $request
     */
    public function deleteProject(int $id)
    {
        return $this->deleteData($id);
    }
}
