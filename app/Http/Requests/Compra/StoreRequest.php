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

    public function messages(): array
    {
        return [
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',

            'valor.required' => 'O valor da compra é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor não pode ser menor que zero.',

            'categoria_id.required' => 'É necessário selecionar uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada é inválida.',

            'data_compra.required' => 'A data da compra é obrigatória.',
            'data_compra.date' => 'A data da compra deve ser válida.',

            'forma_pagamento_id.required' => 'É necessário selecionar uma forma de pagamento.',
            'forma_pagamento_id.exists' => 'A forma de pagamento selecionada é inválida.',
        ];
    }
}
