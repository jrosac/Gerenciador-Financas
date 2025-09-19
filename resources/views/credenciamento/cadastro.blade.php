@extends("layouts.admin")

@section("content")

{{-- Mensagens de sucesso/erro --}}
@if(session('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-xl mx-auto mt-16 px-8 py-8 bg-black/70 backdrop-blur-md rounded-xl shadow-lg">
    <div class="flex justify-center">
        <img src="{{Vite::asset('resources/assets/logo4.png')}}" alt="Logo da empresa" class="h-20 mb-3">
    </div>
    <h1 class="text-3xl font-bold text-white text-center mb-6">Cadastro</h1>

    <form action="{{ route('cadastro.store') }}" method="POST" class="flex flex-col gap-4">
        @csrf

        {{-- Nome --}}
        <div class="flex flex-col">
            <label for="nome" class="text-white mb-1 font-medium">Nome:</label>
            <input
                type="text"
                placeholder="Nome completo"
                name="nome"
                id="nome"
                value="{{ old('nome') }}"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >
            @error('nome')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- E-mail --}}
        <div class="flex flex-col">
            <label for="email" class="text-white mb-1 font-medium">E-mail:</label>
            <input
                type="email"
                placeholder="Digite seu E-mail"
                name="email"
                id="email"
                value="{{ old('email') }}"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Senha --}}
        <div class="flex flex-col">
            <label for="senha" class="text-white mb-1 font-medium">Senha:</label>
            <input
                type="password"
                placeholder="Digite sua Senha"
                name="senha"
                id="senha"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >
            @error('senha')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirmar Senha --}}
        <div class="flex flex-col">
            <label for="senha_confirmation" class="text-white mb-1 font-medium">Confirmar Senha:</label>
            <input
                type="password"
                placeholder="Confirme sua senha"
                name="senha_confirmation"
                id="senha_confirmation"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-400"
            >
        </div>

        {{-- Botão --}}
        <button
            type="submit"
            class="mt-4 w-full bg-green-600 hover:bg-green-500 transition-colors text-white font-bold py-2 px-4 rounded-lg shadow-md cursor-pointer"
        >
            Cadastrar
        </button>

    </form>
</div>

@endsection
