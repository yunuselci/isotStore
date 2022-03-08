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
        return false;
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
            'email'=>'required|string|max:55',
            'phone'=>'required|string|max:55',
            'address'=>'required|string|max:255',
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "İsim boş bırakılamaz.",
            'email.required' => "E-Posta boş bırakılamaz.",
            'phone.required' => "Telefon numarası boş bırakılamaz.",
            'address.required' => "Adres boş bırakılamaz.",
        ];
    }
}
