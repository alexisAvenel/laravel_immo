<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:2'],
            'lastname' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'email', 'min:4'],
            'message' => ['required', 'string', 'min:4'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'First name is required',
            'firstname.min' => 'First name must be at least 2 characters',
            'lastname.required' => 'Last name is required',
            'lastname.min' => 'Last name must be at least 2 characters',
            'phone.required' => 'Phone number is required',
            'phone.min' => 'Phone number must be at least 10 characters',
            'email.required' => 'Email is required',
            'email.min' => 'Email must be at least 4 characters',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 4 characters',
        ];
    }
}
