<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdate extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'phone' => 'required|min:10|numeric',
            'email' => 'required|email',
            'address' => 'required|max:50',
            'owner_name' => 'required',
            'status' => 'required'
        ];
    }
}
