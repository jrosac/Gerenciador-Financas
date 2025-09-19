@extends('layouts.admin')

@section('content')


@php
use ArielMejiaDev\LarapexCharts\LarapexChart;



// Gráfico de pizza estático
$chartPizza= (new LarapexChart)->pieChart()
    ->setTitle('Compras por Status')
    ->setSubtitle('Resumo do sistema')
    ->addData([5, 8, 2])
    ->setLabels(['Baixa', 'Regular', 'Elevada']);

$chartBarra = (new ArielMejiaDev\LarapexCharts\LarapexChart)->barChart()
     ->setTitle('Gastos - 2025')
     ->setSubtitle('Valores em reais')
     ->addData('Vendas', [120.00, 90.00, 150.00, 200.00, 170.00, 140.00, 220.00, 180.00, 160.00, 190.00, 210.00, 250.00])
     ->setXAxis([
         'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
         'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
     ])
     ->setColors(['#10B981'])
     ->setDataLabels(true)
     ->setHeight(500)
     ->setGrid();

$chartLinha = (new LarapexChart)->lineChart()
    ->setTitle('Vendas Mensais - 2025')
    ->setSubtitle('Valores em unidades')
    ->addData('Vendas', [120, 90, 150, 200, 170, 140, 220, 180, 160, 190, 210, 250])
    ->setXAxis([
        'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
        'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
    ])
    ->setColors(['#10B981']) // cor da linha
    ->setDataLabels(true)
    ->setHeight(400)
    ->setGrid();



@endphp

<h1 class="text-4xl font-bold mt-10 mb-15 text-center text-white">
    Dashboards
</h1>

<div class="flex flex-col min-h-screen gap-6 px-6">

    <!-- Primeira linha com 2 gráficos lado a lado -->
    <div class="flex gap-6 mb-10">
        <div class="w-1/2 px-10">
            {!! $chartPizza->container() !!}
        </div>

        <div class="w-1/2 px-10">
            {!! $chartBarra->container() !!}
        </div>
    </div>

    <!-- Linha de baixo com gráfico ocupando 100% -->
    <div class="w-full">
        {!! $chartLinha->container() !!}
    </div>

</div>




{!! $chartPizza->script() !!}
{!! $chartBarra->script() !!}
{!! $chartLinha->script() !!}

</div>
@endsection





