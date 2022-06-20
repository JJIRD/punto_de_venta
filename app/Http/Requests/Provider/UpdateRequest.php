<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => 'required|string|email|unique:providers,email,'.$this->route('provider')->id.'|max:255',
            'ruc_numbre'=>'required|string|min:14|unique:providers,ruc_numbre,'.$this->route('provider')->id.'|max:14',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|min:8|unique:providers,phone,'.$this->route('provider')->id.'|max:8',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',

            'email.required' => 'El email es requerido',
            'email.string' => 'El email debe ser una cadena de texto',
            'email.email' => 'El email debe ser un email válido',
            'email.max' => 'El email no puede tener más de 255 caracteres',
            'email.unique' => 'El email ya existe',

            'ruc_numbre.required' => 'El ruc es requerido',
            'ruc_numbre.string' => 'El ruc no es correcto',
            'ruc_numbre.max' => 'El ruc no puede tener más de 14 caracteres',
            'ruc_numbre.min' => 'El ruc no puede tener menos de 14 caracteres',
            'ruc_numbre.unique' => 'El ruc ya existe',

            'address.string' => 'La dirección no es correcta',
            'address.max' => 'La dirección no puede tener más de 255 caracteres',

            'phone.required' => 'El teléfono es requerido',
            'phone.string' => 'El teléfono no es correcto',
            'phone.max' => 'El teléfono no puede tener más de 8 caracteres',
            'phone.min' => 'El teléfono no puede tener menos de 8 caracteres',
            'phone.unique' => 'El teléfono ya existe',
        ];
    }
}
