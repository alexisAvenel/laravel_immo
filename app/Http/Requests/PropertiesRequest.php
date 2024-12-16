<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PropertiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|numeric|digits:5',
            'area' => 'required|decimal:0,2',
            'pieces' => 'required|integer|min:1',
            'rooms' => 'required|integer|min:1',
            'stage' => 'nullable|integer',
            'price' => 'required|decimal:0,2',
            'sold' => 'boolean',
            'medias' => 'array',
            'options' => 'array',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Un titre est requis',
            'title.max' => 'Le titre ne peut excéder 255 carac.',
            'address.required' => 'Une adresse est requise',
            'address.max' => 'L\'adresse ne peut excéder 255 carac.',
            'city.required' => 'Un ville est requise',
            'city.max' => 'La ville ne peut excéder 255 carac.',
            'zip.required' => 'Un code postal est requis',
            'zip.digits' => 'Le code postal ne doit contenir que 5 chiffres',
            'area.required' => 'Une surface est requise',
            'area.decimal' => 'Seulement 2 chiffres après la virgule autorisés',
            'pieces.required' => 'Un nombre de pièce est requis',
            'pieces.min' => 'Le nombre de pièce doit être au minimum de 1',
            'rooms.required' => 'Un nombre de chambre est requis',
            'rooms.min' => 'Le nombre de chambre doit être au minimum de 1',
            'price.required' => 'Un prix est requis',
            'price.decimal' => 'Seulement 2 chiffres après la virgule autorisés',
        ];
    }
}
