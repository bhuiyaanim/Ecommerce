<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        // switch($this->method())
        // {
        //     case 'GET':
        //     case 'DELETE':
        //     {
        //         return [];
        //     }
        //     case 'POST':
        //     {
        //         return [
        //             'name' => 'required|unique:categories|max:55',
        //         ];
        //     }
        //     case 'PATCH':
        //     case 'PUT':
        //     {
        //         return [
        //             'name' => 'required|max:55',
        //         ];
        //     }
        //     default:break;
        // }
        return [
            'category_name' => 'required|unique:categories|max:55',
        ];
    }
}
