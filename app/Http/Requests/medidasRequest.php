<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class medidasRequest extends FormRequest
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
            'nombreMedida' => 'required|string|max:255',
            'largo' => 'required|numeric',
            'ancho' => 'required|numeric',
            'cantidad_bolsas' => 'required|integer',
            'cantidad_bolsones' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'nombreMedida.required' => 'El campo nombre de medida es obligatorio.',
            'largo.required' => 'El campo largo es obligatorio.',
            'ancho.required' => 'El campo ancho es obligatorio.',
            'cantidad_bolsas.required' => 'El campo cantidad de bolsas es obligatorio.',
            'cantidad_bolsones.required' => 'El campo cantidad de bolsones es obligatorio.',
            // Agrega más mensajes personalizados si es necesario
        ];
    }
}
