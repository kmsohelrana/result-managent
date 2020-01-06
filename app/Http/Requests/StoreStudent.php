<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
//        dd($this->id);
        return [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:students|max:255',
            'phone' => 'required|unique:students|max:255',
            'gender' => 'required',
        ];
    }
}
