@extends('layouts.admin')

@section('content')



<div class="min-h-screen p-6  text-white">
    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Compras</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-xl shadow-lg overflow-hidden">
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
                @foreach ($compras as $compra )

                <tr class="hover:bg-gray-700 transition-colors cursor-pointer"
                    onclick="window.location='{{ route('perfilCompra', $compra->id) }}'">
                    <td class="py-4 px-6">R$ {{$compra->valor}}</td>
                    <td class="py-4 px-6">{{$compra->data_compra}}</td>
                    <td class="py-4 px-6">{{$compra->descricao != null ? $compra->descricao : "N/A"}}</td>
                    <td class="py-4 px-6">{{$compra->categoria->nome}}</td>
                    <td class="py-4 px-6">{{$compra->formaPagamento->nome}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
