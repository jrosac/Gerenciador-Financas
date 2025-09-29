<?php

namespace App\Http\Requests\Compra;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Permite apenas usuários autenticados atualizarem compras
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'valor' => 'required|numeric|min:0',
            'data_compra' => 'required|date',
            'descricao' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id',
        ];
    }
}
