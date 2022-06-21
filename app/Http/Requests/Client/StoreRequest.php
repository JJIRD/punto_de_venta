<?php

namespace App\Http\Requests\Client;

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
            'name' => 'required|string|max:255',
            'dni' => 'required|string|max:14|unique:clients',
            'ruc' => 'nullable|string|max:14|unique:clients',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:8|unique:clients',
            'email' => 'nullable|string|max:255|unique:clients|email:rfc,dns',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'dni.required' => 'El DNI es requerido',
            'dni.unique' => 'El DNI ya existe',
            'dni.string' => 'El DNI debe ser una cadena de texto',
            'dni.max' => 'El DNI no puede tener más de 14 caracteres',
            'ruc.string' => 'El RUC debe ser una cadena de texto',
            'ruc.max' => 'El RUC no puede tener más de 14 caracteres',
            'ruc.unique' => 'El RUC ya existe',
            'phone.unique' => 'El teléfono ya existe',
            'phone.required' => 'El teléfono es requerido',
            'phone.string' => 'El teléfono debe ser una cadena de texto',
            'phone.max' => 'El teléfono no puede tener más de 8 caracteres',
            'email.unique' => 'El email ya existe',
            'email.required' => 'El email es requerido',
            'email.string' => 'El email debe ser una cadena de texto',
            'email.max' => 'El email no puede tener más de 255 caracteres',
            'email.email' => 'El email debe ser un email válido',
        ];
    }
}
