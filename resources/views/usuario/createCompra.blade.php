@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto mt-16 px-8 py-8 bg-black/70 backdrop-blur-md rounded-xl shadow-lg">
    <div class="flex justify-center">
        <img src="{{Vite::asset('resources/assets/logo4.png')}}" alt="Logo da empresa" class="h-20 mb-3">
    </div>
    <h1 class="text-3xl font-bold text-white text-center mb-6">Cadastrar Compra</h1>
    <form action="{{route('createCompra.store')}}" method='POST' class="flex flex-col gap-4">
    @csrf


        <div class="flex flex-col">
            <label for="valor" class="text-white mb-1 font-medium">Valor da Compra:</label>
            <input
                type="text"
                placeholder="Digite o valor total da compra (R$)"
                name="valor"
                id="valor"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >
        </div>

        <div class="flex flex-col">
            <label for="data_compra" class="text-white mb-1 font-medium">Data da compra:</label>
            <input
                type="date"
                name="data_compra"
                id="data_compra"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >


        </div>

        <div class="flex flex-col">
            <label for="descricao" class="text-white mb-1 font-medium">Descrição(opcional)</label>
            <input
                type="text"
                name="descricao"
                id="descricao"
                placeholder="Descreva a compra"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >
        </div>

        <div class="flex flex-col">
            <label for="categoria_id" class="text-white mb-1 font-medium">Categoria</label>
            <select
            name="categoria_id"
            id="categoria_id"
            class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400">
                <option value="" disabled selected>Selecione uma Categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach

            </select>
        </div>

        <div class="flex flex-col">
            <label for="forma_pagamento_id" class="text-white mb-1 font-medium">Categoria</label>
            <select
            name="forma_pagamento_id"
            id="forma_pagamento_id"
            class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400">
                <option value="" disabled selected>Selecione uma forma de pagamento</option>
                @foreach($formas_pagamento as $forma_pagamento)
                    <option value="{{$forma_pagamento->id}}">{{$forma_pagamento->nome}}</option>
                @endforeach

            </select>
        </div>

        <button
            type="submit"
            class="mt-4 w-full bg-green-600 hover:bg-green-500 transition-colors text-white font-bold py-2 px-4 rounded-lg shadow-md cursor-pointer"
        >
            Cadastrar
        </button>

    </form>
</div>
@endsection
