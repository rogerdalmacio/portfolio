<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:projects,title,' . $this->id,
            'tech_stack' => 'required',
            'photo' => 'file|mimes:png,jpg|nullable',
            'url' => 'required',
            'date_started' => 'required',
            'date_finished' => 'required',
            'project_type' => 'required',
            'project_description' => 'required',
        ];
    }
}
