<?php

namespace App\Traits;

use App\Traits\ImageUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

trait Crud {

    use ImageUpload;

    public function generateUuid(): string
    {
        return Str::orderedUuid();
    }

    public function getAllData(Request $request, int $paginate = null)
    {
        return $this->model
            ->when($paginate, function () use($paginate) {
                return $this->model::paginate($paginate);
            })
            ->when(!$paginate, function () {
                return $this->model::all();
            });
    }

    public function getData(int $id)
    {
        return $this->model->find($id)->get();
    }

    public function saveData(int $id = null, Request $request)
    {
        if($id) {
            $this->model = $this->model->find($id);
        }

        $columns = $this->model->getFillablesClone();
        $fileColums = $this->model->photo_path ?? [];
        $fields = array_diff($columns, $fileColums);

        foreach($fields as $column) {
            if($request->has($column)) {
                if(is_array($request[$column])) {
                    $this->model->$column = implode(',', $request[$column]);
                } else {
                    $this->model->$column = $request[$column];
                }
            }
        }

        if($request->hasFile($this->model->photo_path)) {
            $this->saveImage($request->file());
        }

        $this->model->save();

        return $this->model;
    }

    public function saveImage(Array $requestFile)
    {
        $this->uploadImage($requestFile);
    }
    
    public function deleteData(int $id)
    {
        return $this->model->find($id)->delete();
    }
}