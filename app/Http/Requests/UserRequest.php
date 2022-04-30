<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
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
        $rules = [
            "name"     => "required",
            "surname"  => "required",
            "username" => "required|unique:users",
            "type"     => "required",
            "email"    => "required|email|unique:users",
            "password" => "required",
        ];
        if ($this->type === 'PF') {
            $rules = array_merge($rules, [
                "document" => 'required|cpf|unique:users'
            ]);
        } else if ($this->type === 'PJ') {
            $rules = array_merge($rules, [
                "document" => 'required|cnpj|unique:users'
            ]);
        }

        return $rules;
    }

    public function messages() {
        return [
            'name.required'     => 'A name is required',
            'username.required' => 'A username is required',
            'surname.required'  => 'A surname is required',
            'email.required'    => 'A username is required',
            'email.email'       => 'Should be valid email',
            'email.unique'      => 'Email already exists',
            'document.required' => 'A document is required',
            'document.cpf'      => 'Should be a valid CPF',
            'document.cnpj'     => 'Should be a valid CNPJ',
            'password.required' => 'A password is required',
            'document.unique'   => 'Document already exists',
            'username.unique'   => 'Username already exists',
        ];
    }
}
