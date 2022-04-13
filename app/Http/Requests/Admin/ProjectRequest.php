<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'users_id' => 'required|exists:users,id',
            'category_projects_id' => 'required|exists:category_projects,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'fitur' => 'required',
        ];
    }
}
