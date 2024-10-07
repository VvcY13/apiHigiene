<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlmacenMaquinasRequest extends FormRequest
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
            'id_almacen' => 'required|exists:almacenes,id',
            'id_insumo' => 'required|exists:insumos,id',
            'cantidad' => 'required|integer|min:1',
            'unidad_medida' => 'required|string|max:50',
            'diametro_cm' => 'required|numeric|min:0',
            'diametro_metros' => 'required|numeric|min:0',
            'cantidad_kilos' => 'required|numeric|min:0',
            'cantidad_gramos' => 'required|numeric|min:0',
        ];
    }
}
