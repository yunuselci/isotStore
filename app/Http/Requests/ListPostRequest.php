<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ListPostRequest extends FormRequest
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
        $categoryNumber = Category::all()->count();
        return [
            'name'=>'required|string|max:255|min:2',
            'description'=>'required|string|max:255|min:2',
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'unit'=>'required|string|max:45|min:2',
            'type'=>'required|integer|between:1,2',
            'status'=>'required|integer|between:1,2',
            'delivery_status'=>'required|integer|between:1,3',
            'faulty'=>'required|integer|between:1,2',
            'origin'=>'required|string|max:45|min:2',
            'category_id'=>'required|integer|between:1,'.$categoryNumber,

        ];
    }
}
