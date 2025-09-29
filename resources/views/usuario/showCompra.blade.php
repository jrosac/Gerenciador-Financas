@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto mt-16 px-8 py-8 bg-black/70 backdrop-blur-md rounded-xl shadow-lg">
    <div class="flex justify-center">
        <img src="{{ Vite::asset('resources/assets/logo4.png') }}" alt="Logo da empresa" class="h-20 mb-3">
    </div>
    <h1 class="text-3xl font-bold text-white text-center mb-6">Detalhes da Compra</h1>

    <div class="flex flex-col gap-4 text-white">

        <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
            <span class="font-medium text-gray-300">Valor da Compra:</span>
            <span class="text-green-400 font-bold text-lg">R$ {{ $compra->valor }}</span>
        </div>

        <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
            <span class="font-medium text-gray-300">Data da Compra:</span>
            <span class="text-white font-semibold text-lg">{{ $compra->data_compra }}</span>
        </div>

        <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
            <span class="font-medium text-gray-300">Descrição:</span>
            <span class="text-white font-semibold text-lg">{{ $compra->descricao ?? 'N/A' }}</span>
        </div>

        <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
            <span class="font-medium text-gray-300">Categoria:</span>
            <span class="font-bold text-lg">{{ $compra->categoria->nome }}</span>
        </div>

        <div class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
            <span class="font-medium text-gray-300">Forma de Pagamento:</span>
            <span class=" font-bold text-lg">{{ $compra->formaPagamento->nome }}</span>
        </div>

        <!-- Botão Voltar -->
        <a href="{{ route('indexCompra') }}"
           class="mt-6 text-center w-full bg-green-600 hover:bg-green-500 transition-colors text-white font-bold py-2 px-4 rounded-lg shadow-md cursor-pointer block">
            Voltar
        </a>

        <!-- Botão Editar -->
        <a href="#"
           class="mt-2 text-center w-full bg-yellow-500 hover:bg-yellow-400 transition-colors text-white font-bold py-2 px-4 rounded-lg shadow-md cursor-pointer block">
            Editar
        </a>

    </div>
</div>

@endsection
