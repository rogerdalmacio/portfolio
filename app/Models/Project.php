<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tech_stacks' => 'array',
    ];

    public $photo_path = ['photo'];

    protected $directory = 'projects';

    public function getDirectory()
    {
        return $this->directory;
    }

    protected $fillables = [
        'title',
        'tech_stack',
        'photo',
        'url',
        'visitor_counter',
        'date_started',
        'date_finished',
        'project_type',
        'project_description',
    ];

    public function getFillablesClone()
    {
        return $this->fillables;
    }
}
