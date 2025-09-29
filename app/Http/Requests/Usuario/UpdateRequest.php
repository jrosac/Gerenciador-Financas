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
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuarioId,
        ];
    }
}
