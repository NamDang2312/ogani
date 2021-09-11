<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:category',
            'prioty' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name must be required',
            'prioty.required' => 'Prioty must be required',
            'name.unique' => 'Name have exit in DB'
        ];
    }
}
