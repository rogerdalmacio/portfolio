<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'tech_stack' => explode(',', $this->tech_stack),
            'photo' => $this->photo,
            'url' => $this->url,
            'date_started' => $this->date_started,
            'date_finished' => $this->date_finished,
            'project_type' => $this->project_type,
            'project_description' => $this->project_description,
            'visitor_counter' => $this->visitor_counter,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
