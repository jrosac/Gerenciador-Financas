@extends("layouts.admin")

@section("content")

<div class="max-w-md mx-auto mt-16 px-8 py-8 bg-black/70 backdrop-blur-md rounded-xl shadow-lg">
    <div class="flex justify-center">
        <img src="{{Vite::asset('resources/assets/logo4.png')}}" alt="Logo da empresa" class="h-20 mb-3">
    </div>
    <h1 class="text-3xl font-bold text-white text-center mb-6">Login</h1>
    <form action="" class="flex flex-col gap-4">

        <div class="flex flex-col">
            <label for="email" class="text-white mb-1 font-medium">E-mail:</label>
            <input
                type="email"
                placeholder="Digite seu E-mail"
                name="email"
                id="email"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            >
        </div>

        <div class="flex flex-col">
            <label for="senha" class="text-white mb-1 font-medium">Senha:</label>
            <input
                type="password"
                placeholder="Digite sua Senha"
                name="senha"
                id="senha"
                class="px-4 py-2 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            >
        </div>

        <button
            type="submit"
            class="mt-4 w-full bg-green-600 hover:bg-green-500 transition-colors text-white font-bold py-2 px-4 rounded-lg shadow-md cursor-pointer"
        >
            Entrar
        </button>

    </form>
    <div class="mt-2">
        <a href="#" class="text-white mb-1 font-medium hover:text-gray-400 transition">Esqueceu sua senha?</a>
    </div>
</div>

@endsection
