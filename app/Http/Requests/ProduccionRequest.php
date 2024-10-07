<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduccionRequest extends FormRequest
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
            'id_insumo' => 'required|exists:insumos,id',
            'cantidad_producida' => 'required|integer|min:1',
            'diametro_inicial' => 'required|numeric|min:0',
            'diametro_final' => 'required|numeric|min:0',
        ];
    }
}
