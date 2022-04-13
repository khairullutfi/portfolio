<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DesignRequest extends FormRequest
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
            'categories_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'title' => 'required|max:255',
            'description' => 'required',
        ];
    }
}
