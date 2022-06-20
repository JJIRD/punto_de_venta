<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|string|max:50',
            'imgage' => 'required|dimensions:max_width=100,max_height=200',
            'lote' => 'required|string|unique:products,lote,'.$this->route('product')->id.'|max:255',
            'stock' => 'required|integer',
            'sell_price' => 'required',
            'category_id' => 'interger|required|exists:categories,id',
            'provider_id' => 'integer|required|exists:providers,id',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no puede tener más de 50 caracteres',
            'imgage.required' => 'La imagen es requerida',
            'imgage.dimensions' => 'La imagen debe tener una altura máxima de 200px y una anchura máxima de 100px',
            'lote.required' => 'El lote es requerido',
            'lote.string' => 'El lote debe ser una cadena de texto',
            'lote.unique' => 'El lote ya existe',
            'lote.max' => 'El lote no puede tener más de 255 caracteres',
            'stock.required' => 'El stock es requerido',
            'stock.integer' => 'El stock debe ser un número entero',
            'sell_price.required' => 'El precio de venta es requerido',
            'category_id.required' => 'La categoría es requerida',
            'category_id.exists' => 'La categoría no existe',
            'provider_id.required' => 'El proveedor es requerido',
            'provider_id.exists' => 'El proveedor no existe',
        ];
    }
}
