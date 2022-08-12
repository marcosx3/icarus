<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateClienteFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            "name" => 'required | min:3',
            "email" => 'email | required | min:3',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
        ];

        if($this->method('PUT'))
        {
            $rules['email'] = 'min:3';
        }

        return $rules;
    }
}
