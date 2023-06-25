<?php

namespace App\Service;

use App\Models\TechStack;
use App\Traits\Crud;
use Illuminate\Http\Request;

class TechStackService
{

    use Crud;

    protected $model;

    public function __construct(TechStack $model)
    {
        $this->model = $model;
    }

    public function createTechStack(String $techString): void
    {
        $techArray = $this->toArray($techString);

        foreach($techArray as $tech) {
            $this->model->firstOrCreate([
                'tech' => $tech
            ]);
        }
    }

    public function toArray(String $techString): array
    {
        return explode(',', $techString);
    }
}
