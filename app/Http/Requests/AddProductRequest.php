<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            // update
            return [
                'title' => 'required|string|min:3',
                'sub_category_id' => 'required|numeric|exists:categories,id',
                'brand_id' => 'nullable|numeric|exists:brands,id',
                'price' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'qty' => 'required|numeric',
                'sku' => 'nullable|string',
                'photo' => 'mimes:jpg,png,jpeg,jfif',
                'short_descr' => 'required|string',
                'descr' => 'required|string',
                'keywords_meta' => 'required|string',
                'descriptive_meta' => 'required|string',
                'product_imgs' => '',
                // 'product_imgs.*' => 'mimes:jpg,png,jpeg,jfif',
                'specifications' => 'required',
                'options' => 'nullable',
            ];
        } else {
            // add
            return [
                'title' => 'required|string|min:3',
                'sub_category_id' => 'required|numeric|exists:categories,id',
                'brand_id' => 'nullable|numeric|exists:brands,id',
                'price' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'qty' => 'required|numeric',
                'sku' => 'nullable|string',
                'photo' => 'required|mimes:jpg,png,jpeg,jfif',
                'short_descr' => 'required|string',
                'descr' => 'required|string',
                'keywords_meta' => 'required|string',
                'descriptive_meta' => 'required|string',
                'product_imgs' => 'required',
                // 'product_imgs.*' => 'mimes:jpg,png,jpeg,jfif',
                'specifications' => 'required',
                'options' => 'nullable',
            ];
        }
    }
}
