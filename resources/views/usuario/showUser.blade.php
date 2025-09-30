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

    <!-- Formulário Dinâmico -->
    <form action="{{ route('perfilUpdate') }}" method="POST" id="usuarioForm" class="flex flex-col gap-4 text-white">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="flex flex-col">
            <label for="nome" class="mb-1 font-medium text-gray-300">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $usuario->nome }}"
                   class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
                   readonly>
            @error('nome')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="flex flex-col">
            <label for="email" class="mb-1 font-medium text-gray-300">Email:</label>
            <input type="email" name="email" id="email" value="{{ $usuario->email }}"
                   class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500"
                   readonly>
            @error('email')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botões -->
        <div class="flex gap-4 mt-4">
            <button type="button" id="editarBtn"
                    class="w-full bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors cursor-pointer">
                Editar Perfil
            </button>
            <button type="submit" id="salvarBtn"
                    class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors hidden cursor-pointer">
                Salvar
            </button>
        </div>
    </form>

</div>

<!-- Script para tornar campos editáveis -->
<script>
    const editarBtn = document.getElementById('editarBtn');
    const salvarBtn = document.getElementById('salvarBtn');
    const form = document.getElementById('usuarioForm');

    editarBtn.addEventListener('click', () => {
        form.querySelectorAll('input').forEach(el => {
            el.removeAttribute('readonly');
            el.classList.add('ring-2', 'ring-green-500'); // destaca visualmente os inputs
        });
        editarBtn.classList.add('hidden');
        salvarBtn.classList.remove('hidden');
    });
</script>

@endsection
