<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopPostRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:55',
            'phone'=>'required|string|max:55',
            'address'=>'required|string|max:255',
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
        ];
    }

}
