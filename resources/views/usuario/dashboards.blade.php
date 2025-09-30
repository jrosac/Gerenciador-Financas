@extends('layouts.admin')

@section('content')

<h1 class="text-3xl md:text-4xl font-bold mt-10 mb-8 text-center text-white">
    Dashboards
</h1>

<div class="flex flex-col min-h-screen gap-8 px-4 md:px-6">

    <!-- Primeira linha: empilhado no mobile, lado a lado no desktop -->
    <div class="flex flex-col md:flex-row gap-8 mb-10">
        <div class="w-full md:w-1/2 bg-black/40 rounded-xl p-4 md:p-6 shadow-md">
            <div class="overflow-x-auto">
                {!! $chartPizza->container() !!}
            </div>
        </div>

        <div class="w-full md:w-1/2 bg-black/40 rounded-xl p-4 md:p-6 shadow-md">
            <div class="overflow-x-auto">
                {!! $chartBarra->container() !!}
            </div>
        </div>
    </div>

    <!-- Linha de baixo com gráfico ocupando 100% -->
    <div class="w-full bg-black/40 rounded-xl p-4 md:p-6 shadow-md">
        <div class="overflow-x-auto">
            {!! $chartLinha->container() !!}
        </div>
    </div>

</div>

{!! $chartBarra->script() !!}
{!! $chartPizza->script() !!}
{!! $chartLinha->script() !!}

@endsection
