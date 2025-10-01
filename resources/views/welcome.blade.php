@extends('layouts.admin')

@section('content')


<x-alert />

<div class="min-h-screen  flex flex-col items-center p-8">
    <h1 class="text-gray-200 text-5xl w-full text-center font-bold mb-20">Gerenciador de Finanças</h1>

    <section class="flex flex-col md:flex-row w-full max-w-7xl gap-20">
        <!-- Texto explicativo -->
        <div class="flex-1 text-white space-y-4 md:mr-10">
            <span class="text-3xl font-semibold mb-4 inline-block">Bem-vindo ao Sistema Gerenciador de Finanças</span>
            <p class="text-gray-200 leading-relaxed text-xl">
                Aqui você encontra uma maneira simples, prática e intuitiva de acompanhar seus gastos e manter o controle das suas finanças. Nosso objetivo é ajudar você a entender para onde o seu dinheiro está indo e facilitar a organização do seu orçamento, seja para administrar as contas do dia a dia, planejar uma compra importante ou construir uma reserva para o futuro.
            </p>
            <p class="text-gray-200 leading-relaxed text-xl">
                Na sua página inicial, você terá acesso rápido a um resumo das suas movimentações recentes, um painel com gráficos para visualizar melhor seus gastos por categoria e atalhos para registrar novas despesas. Tudo foi pensado para que, em poucos cliques, você consiga ter uma visão clara da sua saúde financeira e tomar decisões mais conscientes.
            </p>
        </div>

        <!-- Login/Cadastro -->
        <div class="flex-1 bg-white/8 p-8 rounded-2xl backdrop-blur-md flex flex-col items-center justify-center space-y-6 md:ml-10">
            <p class="text-white text-center text-lg">
                descubra uma forma simples de organizar seu dinheiro. Acesse sua conta para continuar acompanhando suas finanças ou cadastre-se agora mesmo .
            </p>
            <div class="flex gap-4">

                <x-link-button color="success" href="{{route('cadastro')}}">
                    Cadastro
                </x-link-button>

                <x-link-button  href="{{route('login')}}">
                    Login
                </x-link-button>
            </div>
        </div>
    </section>
</div>


@endsection
