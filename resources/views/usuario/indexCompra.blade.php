@extends('layouts.admin')

@section('content')


<x-alert />
<div class="min-h-screen p-4 text-white">
    <h1 class="text-2xl font-bold mb-4 text-center sm:text-3xl">Lista de Compras</h1>

    {{-- Cards mobile first --}}
    <div class="space-y-4 sm:hidden">
        @foreach ($compras as $compra)
        <div class="bg-gray-800 p-4 rounded-lg shadow hover:bg-gray-700 transition-colors cursor-pointer"
            onclick="window.location='{{ route('perfilCompra', $compra->id) }}'">
            <p><strong>Valor:</strong> R$ {{$compra->valor}}</p>
            <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($compra->data_compra)->format('d-m-Y') }}</p>
            <p><strong>Descrição:</strong> {{$compra->descricao ?? 'N/A'}}</p>
            <p><strong>Categoria:</strong> {{$compra->categoria->nome}}</p>
            <p><strong>Pagamento:</strong> {{$compra->formaPagamento->nome}}</p>
        </div>
        @endforeach
    </div>

    {{-- Tabela para telas sm ou maiores --}}
    <div class="hidden sm:block overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-xl shadow-lg overflow-hidden text-sm sm:text-base">
            <thead class="bg-gray-700">
                <tr>
                    <th class="py-3 px-6 text-left">Valor</th>
                    <th class="py-3 px-6 text-left">Data da Compra</th>
                    <th class="py-3 px-6 text-left">Descrição</th>
                    <th class="py-3 px-6 text-left">Categoria</th>
                    <th class="py-3 px-6 text-left">Forma de Pagamento</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($compras as $compra)
                <tr class="hover:bg-gray-700 transition-colors cursor-pointer"
                    onclick="window.location='{{ route('perfilCompra', $compra->id) }}'">
                    <td class="py-4 px-6">R$ {{$compra->valor}}</td>
                    <td class="py-4 px-6">{{ \Carbon\Carbon::parse($compra->data_compra)->format('d-m-Y') }}</td>
                    <td class="py-4 px-6">{{$compra->descricao ?? 'N/A'}}</td>
                    <td class="py-4 px-6">{{$compra->categoria->nome}}</td>
                    <td class="py-4 px-6">{{$compra->formaPagamento->nome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
