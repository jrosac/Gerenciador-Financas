@extends("layouts.admin")

@section('content')

<div class="min-h-screen flex flex-col items-center p-6 text-white">
    <h1 class="text-4xl font-bold mb-2 text-center">Bem-vindo ao Sistema, {{$usuario->nome}}</h1>
    <p class="text-gray-300 mb-8 text-xl text-center">Aqui está um resumo do seu perfil e atividades recentes:</p>

    <!-- Resumo do usuário -->
    <div class="w-full max-w-3xl grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="p-6 bg-gray-800 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold">Compras Feitas</h2>
            <p class="text-3xl mt-2">15</p>
        </div>
        <div class="p-6 bg-gray-800 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold">Gasto total</h2>
            <p class="text-3xl mt-2">R$ 2.350,00</p>
        </div>
        <div class="p-6 bg-gray-800 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold">Último Acesso</h2>
            <p class="text-3xl mt-2">16/09/2025</p>
        </div>
    </div>

    <!-- Ações rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-3xl mb-10">
        <a href="{{route('update')}}" class="text-xl p-8 bg-blue-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
            Atualizar Perfil
            <p class="text-sm mt-2 text-gray-200">Edite suas informações pessoais</p>
        </a>
        <a href="{{route("createCompra")}}" class="text-xl p-8 bg-green-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
            Cadastrar Compra
            <p class="text-sm mt-2 text-gray-200">Adicione uma nova compra ao sistema</p>
        </a>
        <a href="{{route('dashboards')}}" class="text-xl p-8 bg-yellow-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
            Dashboards
            <p class="text-sm mt-2 text-gray-200">Visualize gráficos e relatórios</p>
        </a>
        <a href="{{route('IndexCompra')}}" class="text-xl p-8 bg-purple-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
            Listar Compras
            <p class="text-sm mt-2 text-gray-200">Veja o histórico completo de compras</p>
        </a>
    </div>

    <!-- Últimas atividades -->
    <div class="w-full max-w-3xl bg-gray-800 p-6 rounded-xl shadow">
        <h2 class="text-2xl font-semibold mb-4">Últimas Compras</h2>
        <ul class="space-y-2">
            <li class="p-2 bg-gray-700 rounded">Compra #101 - R$ 150,00 - 14/09/2025</li>
            <li class="p-2 bg-gray-700 rounded">Compra #102 - R$ 320,00 - 12/09/2025</li>
            <li class="p-2 bg-gray-700 rounded">Compra #103 - R$ 75,00 - 10/09/2025</li>
        </ul>
    </div>
</div>


@endsection
