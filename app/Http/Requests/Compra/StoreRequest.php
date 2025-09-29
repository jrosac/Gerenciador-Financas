<?php

namespace App\Http\Requests\Compra;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Permite qualquer usuário autenticado criar uma compra
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'descricao' => 'nullable|string|max:255',
            'valor' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'data_compra' => 'required|date',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id',
        ];
    }
}
