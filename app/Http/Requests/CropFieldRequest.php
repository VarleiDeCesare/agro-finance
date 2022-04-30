<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropFieldRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'    => 'required',
            'qnt_hec' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ];
    }
    public function messages() {
        return [
            'name.required'     => 'A name is required',
            'user_id.exists' => 'Non-existing user',
            'qnt_hec.required' => 'Quantity of hectares is required',
        ];
    }
}
