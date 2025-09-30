@extends("layouts.admin")

@section('content')

<script>
    // Se o usuário NÃO estiver logado, redireciona para a página de login
    @guest
        window.location.href = "{{ route('login') }}";
    @endguest

    // Detecta caso a página venha do cache do navegador (back/forward cache)
    window.addEventListener("pageshow", function(event) {
        if (event.persisted) {
            @guest
                window.location.href = "{{ route('login') }}";
            @endguest
        }
    });
</script>



<div class="min-h-screen flex flex-col items-center p-6 text-white">
    <h1 class="text-4xl font-bold mb-2 text-center">Bem-vindo ao Sistema, {{$usuario->nome}}</h1>
    <p class="text-gray-300 mb-8 text-xl text-center">Aqui está um resumo do seu perfil e atividades recentes:</p>

    <!-- Resumo do usuário -->
    <div class="w-full max-w-3xl grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="p-6 bg-gray-800 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold">Compras Feitas</h2>
            <p class="text-3xl mt-2">{{$quantidadeCompras}}</p>
        </div>
        <div class="p-6 bg-gray-800 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold">Gasto total</h2>
            <p class="text-3xl mt-2">R${{$valorTotalCompras}}</p>
        </div>
        <div class="p-6 bg-gray-800 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold">Gasto no mês</h2>
            <p class="text-3xl mt-2">R${{$totalMes}}</p>
        </div>
    </div>

    <!-- Ações rápidas -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-3xl mb-10">

    <!-- Primeiro card ocupa toda a linha -->
    <a href="{{route('createCompra')}}" class="text-xl p-8 bg-green-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300 md:col-span-3">
        Cadastrar Compra
        <p class="text-sm mt-2 text-gray-200">Adicione uma nova compra ao sistema</p>
    </a>

    <!-- Três cards iguais na linha de baixo -->
    <a href="{{route('dashboards')}}" class="text-xl p-8 bg-yellow-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
        Dashboards
        <p class="text-sm mt-2 text-gray-200">Visualize gráficos e relatórios</p>
    </a>

    <a href="{{route('indexCompra')}}" class="text-xl p-8 bg-purple-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
        Listar Compras
        <p class="text-sm mt-2 text-gray-200">Veja o histórico completo de compras</p>
    </a>

    <a href="{{route('generatePDF')}}" class="text-xl p-8 bg-indigo-600 rounded-xl text-center shadow hover:scale-105 transition-transform duration-300">
        Gerar Relatório
        <p class="text-sm mt-2 text-gray-200">Gere relatórios detalhados, baseado em suas compras</p>
    </a>

</div>


    <!-- Últimas atividades -->
    <div class="w-full max-w-3xl bg-gray-800 p-6 rounded-xl shadow">
        <h2 class="text-2xl font-semibold mb-4">Últimas Compras</h2>
        <ul class="space-y-2">
            @foreach ($ultimasCompras as $compra )
            <li class="p-2 bg-gray-700 rounded">R${{$compra->valor}} - {{ \Carbon\Carbon::parse($compra->data_compra)->format('d-m-Y') }} -> {{$compra->descricao != null ? $compra->descricao: "Sem Descrição"}}</li>
            @endforeach

        </ul>
    </div>
</div>


@endsection
