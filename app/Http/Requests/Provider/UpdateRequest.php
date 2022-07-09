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
            'name'=>'required|string|max:255',

            'email'=>'required|email|string|unique:providers,email,'. $this->route('provider')->id.'|max:255', 


            'ruc_number'=>'required|string|min:14|unique:providers,ruc_number,'. $this->route('provider')->id.'|max:14', 

            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|min:8|unique:providers,phone,'. $this->route('provider')->id.'|max:8', 
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 255 caracteres.',
            
            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrónico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permiten 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',

            'ruc_number.required'=>'Este campo es requerido.',
            'ruc_number.string'=>'El valor no es correcto.',
            'ruc_number.max'=>'Solo se permiten 14 caracteres.',
            'ruc_number.min'=>'Se requiere de 14 caracteres.',
            'ruc_number.unique'=>'Ya se encuentra registrado.',

            'address.max'=>'Solo se permiten 255 caracteres.',
            'address.string'=>'El valor no es correcto.',

            'phone.required'=>'Este campo es requerido.',
            'phone.string'=>'El valor no es correcto.',
            'phone.max'=>'Solo se permiten 8 caracteres.',
            'phone.min'=>'Se requiere de 8 caracteres.',
            'phone.unique'=>'Ya se encuentra registrado.',
        ];
    }
}
