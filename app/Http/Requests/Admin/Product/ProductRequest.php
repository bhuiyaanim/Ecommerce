<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|max:55|string',
            'product_code' => 'required|unique:products|max:25|alpha_num',
            'product_quantity' => 'required|numeric|min:1|max:4',
            'category_id' => 'required',
            'product_color' => 'required|max:55',
            'selling_price' => 'required|numeric|min:2|max:5',
            'product_details' => 'required|max:255',
            'video_link' => 'url',
            'image_one' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_two' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_three' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }
}
