<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required|string|between:2,100',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // 'dob' => 'required|date|before:today',
            // 'gender' => 'required|in:male,female',
            // 'phone' => 'required|string|min:10|max:13|unique:users',
            // 'address' => 'required|string|max:255',
            // 'city' => 'required|string|max:255',
            // 'state' => 'required|string|max:255',
            // 'country' => 'required|string|max:255',
            // 'zip_code' => 'required|string|max:10',
            // 'terms_and_conditions' => 'required|accepted',
        ];
    }
}
