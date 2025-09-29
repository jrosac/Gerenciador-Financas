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
        <img src="{{ Vite::asset('resources/assets/logo4.png') }}" alt="Logo da empresa" class="h-20 mb-3">
    </div>

    <h1 class="text-3xl font-bold text-white text-center mb-6">Perfil do Usuário</h1>

    <div class="space-y-3 text-white">
        <p><strong>Nome:</strong> {{$usuario->nome}}</p>
        <p><strong>Email:</strong> {{$usuario->email}}</p>
    </div>

    <div class="flex justify-center mt-6">
        <a href="#"
           class="bg-yellow-500 hover:bg-yellow-600 transition-colors text-white font-bold px-6 py-2 rounded-lg shadow-md">
            Editar Perfil
        </a>
    </div>
</div>

@endsection
