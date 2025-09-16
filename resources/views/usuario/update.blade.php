@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto mt-16 px-10 py-10 bg-black/70 backdrop-blur-md rounded-xl shadow-lg">
    <div class="flex justify-center">
        <img src="{{Vite::asset('resources/assets/logo4.png')}}" alt="Logo da empresa" class="h-20 mb-3">
    </div>
    <h1 class="text-3xl font-bold text-white text-center mb-6">Atualização de Dados</h1>
    <form action="" class="flex flex-col gap-4">

        <div class="flex flex-col">
            <label for="nome" class="text-white mb-1 font-medium">Nome:</label>
            <input
                type="nome"
                placeholder="Digite um novo nome"
                name="nome"
                id="nome"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            >
        </div>

        <div class="flex flex-col">
            <label for="email" class="text-white mb-1 font-medium">E-mail:</label>
            <input
                type="email"
                placeholder="Digite um novo e-mail válido"
                name="email"
                id="email"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            >
        </div>

        <button
            type="submit"
            class="mt-4 w-full bg-green-600 hover:bg-green-500 transition-colors text-white font-bold py-2 px-4 rounded-lg shadow-md cursor-pointer"
        >
            Atualizar
        </button>

    </form>
</div>

@endsection
