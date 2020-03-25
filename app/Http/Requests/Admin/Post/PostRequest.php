<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_title_en' => 'required|unique:posts|max:55',
            'post_title_bn' => 'required|unique:posts|max:55',
            'post_category_id' => 'required',
            'details_en' => 'required|max:10000',
            'details_bn' => 'required|max:10000',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }
}
