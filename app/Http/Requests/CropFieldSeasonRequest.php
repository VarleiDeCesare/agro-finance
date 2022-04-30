<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropFieldSeasonRequest extends FormRequest {
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
            'start_date' => 'required|date',
            'cereal_id' => 'required|exists:cereals,id',
        ];
    }
    public function messages() {
        return [
            'crop_field_id.required'     => 'Crop Field is required',
            'crop_field_id.exists' => 'Non-existing Crop Field with this ID',
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Should be valid Date',
            'cereal_id.required' => 'Cereal is required',
            'cereal_id.exists' => 'Non-existing Cereal with this ID',
        ];
    }
}
