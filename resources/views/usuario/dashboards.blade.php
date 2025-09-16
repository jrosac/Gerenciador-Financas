@extends('layouts.admin')

@section('content')
@php
use ArielMejiaDev\LarapexCharts\LarapexChart;

// Gráfico de pizza estático
$chart = (new LarapexChart)->pieChart()
    ->setTitle('Compras por Status')
    ->setSubtitle('Resumo do sistema')
    ->addData([5, 8, 2])
    ->setLabels(['Baixa', 'Regular', 'Elevada'])
    ->setColors(['#22c55e', '#facc15', '#ef4444'])
    ->setFontColor('#ff6384');

@endphp

<div class="min-h-screen p-6 bg-gray-900 text-white">
    <h1 class="text-3xl font-bold mb-6 text-center">Dashboards Estático</h1>

    <div class="max-w-md mx-auto ">
        {!! $chart->container() !!}
    </div>


    {!! $chart->script() !!}
</div>
@endsection



