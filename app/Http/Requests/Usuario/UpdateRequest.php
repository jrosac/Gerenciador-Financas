<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Permite que qualquer usuário autenticado atualize seu próprio perfil
        return Auth::check();
    }

    public function rules(): array
    {
        $usuarioId = Auth::id(); // pega o ID do usuário autenticado

        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^0-9]*$/', // não permite números
            ],
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuarioId,
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'nome.regex' => 'O nome não pode conter números.',

            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.max' => 'O email não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este email já está em uso por outro usuário.',
        ];
    }
}
