<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProduct extends FormRequest
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
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'user_id' => 'required',

        ];
    }
    public function messages(){
        return [
            'title.required' => 'El producto necesita un precio',
            'amount.required' => 'El producto requiere un precio',
            'description.required' => 'El producto requiere una descripcion',
            'user_id.required' => 'El producto requiere una usuario'

    ];
    }
}
