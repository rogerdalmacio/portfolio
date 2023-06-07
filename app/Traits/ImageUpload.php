<?php

namespace App\Traits;

trait ImageUpload {
    
    public function uploadImage(Array $file)
    {
        foreach($this->model->photo_path as $photo_path) {
            $fileName = $this->generateUuid() . '.' . $file[$photo_path]->getClientOriginalExtension();
            $this->model->$photo_path = $fileName;
            $file[$photo_path]->storeAs(
                'public/' . $this->model->getDirectory(),
                $fileName
            );
        }
    }
}