<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
        if (request()->isMethod('patch')) {
            return [
                'name' => 'required|string|min:3',
                'descr' => 'max:200',
                'photo' => 'mimes:jpg,png,jpeg,jfif',
            ];
        } else {
            return [
                'name' => 'required|string|min:3',
                'descr' => 'max:200',
                'photo' => 'required|mimes:jpg,png,jpeg,jfif',
            ];
        }
    }
}
