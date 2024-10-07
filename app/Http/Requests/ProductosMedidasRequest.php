<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosMedidasRequest extends FormRequest
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
            'id_producto' => 'required|exists:productos,id',
            'id_medida' => 'required|exists:medidas,id',
            'cantidad_unitaria' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'id_producto.required' => 'El campo id_producto es obligatorio.',
            'id_medida.required' => 'El campo id_medida es obligatorio.',
            'cantidad_unitaria.required' => 'El campo cantidad unitaria es obligatorio.',
            // Agrega más mensajes personalizados si es necesario
        ];
    }
}
