<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_documento' => 'required|string|max:50',
            'numero_documento' => 'required|string|max:50|unique:users,numero_documento',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'rol' => 'required|string|max:50',
            'estado' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
           'nombres.required' => 'El campo nombres es obligatorio.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            // Agrega mensajes personalizados para otros campos según sea necesario
        ];
    }
}
