@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto mt-16 px-8 py-8 bg-black/70 backdrop-blur-md rounded-xl shadow-lg">
    <div class="flex justify-center">
        <img src="{{ Vite::asset('resources/assets/logo4.png') }}" alt="Logo da empresa" class="h-20 mb-3">
    </div>
    <h1 class="text-3xl font-bold text-white text-center mb-6">Detalhes da Compra</h1>

    <!-- Formulário Dinâmico -->
    <form action="{{ route('atualizarCompra', $compra->id) }}" method="POST" id="compraForm" class="flex flex-col gap-4">
        @csrf
        @method('PUT')

        <!-- Valor -->
        <div class="flex flex-col">
            <label for="valor" class="text-gray-300 font-medium mb-1">Valor da Compra:</label>
            <input type="text" name="valor" id="valor" value="{{ $compra->valor }}"
                   class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
                   readonly>
        </div>

        <!-- Data -->
        <div class="flex flex-col">
            <label for="data_compra" class="text-gray-300 font-medium mb-1">Data da Compra:</label>
            <input type="date" name="data_compra" id="data_compra" value="{{ $compra->data_compra }}"
                   class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
                   readonly>
        </div>

        <!-- Descrição -->
        <div class="flex flex-col">
            <label for="descricao" class="text-gray-300 font-medium mb-1">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="{{ $compra->descricao ?? '' }}"
                   class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
                   readonly>
        </div>

        <!-- Categoria -->
        <div class="flex flex-col">
            <label for="categoria_id" class="text-gray-300 font-medium mb-1">Categoria:</label>
            <select name="categoria_id" id="categoria_id"
                    class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    disabled>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $compra->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Forma de Pagamento -->
        <div class="flex flex-col">
            <label for="forma_pagamento_id" class="text-gray-300 font-medium mb-1">Forma de Pagamento:</label>
            <select name="forma_pagamento_id" id="forma_pagamento_id"
                    class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-green-500"
                    disabled>
                @foreach($formas_pagamento as $forma)
                    <option value="{{ $forma->id }}" {{ $compra->forma_pagamento_id == $forma->id ? 'selected' : '' }}>
                        {{ $forma->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botões -->
        <div class="flex flex-col gap-4 mt-4">
            <!-- Botão Editar -->
            <button type="button" id="editarBtn"
                    class="w-full bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors cursor-pointer">
                Editar
            </button>

            <!-- Botão Salvar -->
            <button type="submit" id="salvarBtn"
                    class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors hidden cursor-pointer">
                Salvar
            </button>

            <!-- Botão Deletar -->
            <form action="{{ route('deletarCompra', $compra->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar esta compra?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors cursor-pointer">
                    Deletar
                </button>
            </form>
        </div>

    </form>
</div>

<!-- Script para tornar campos editáveis -->
<script>
    const editarBtn = document.getElementById('editarBtn');
    const salvarBtn = document.getElementById('salvarBtn');
    const form = document.getElementById('compraForm');

    editarBtn.addEventListener('click', () => {
        // Torna todos inputs e selects editáveis
        form.querySelectorAll('input, select').forEach(el => {
            el.removeAttribute('readonly');
            el.removeAttribute('disabled');
        });

        // Mostra o botão salvar e esconde o botão editar
        editarBtn.classList.add('hidden');
        salvarBtn.classList.remove('hidden');
    });
</script>

@endsection
