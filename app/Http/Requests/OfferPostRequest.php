<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferPostRequest extends FormRequest
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
            'user_name'=>'required|string|max:255',
            'user_email'=>'required|email|max:55',
            'user_phone'=>'required|string|max:55',
            'description'=>'required|string|max:255',
        ];
    }
}
