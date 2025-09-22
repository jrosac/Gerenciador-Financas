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
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <tr class="hover:bg-gray-700 transition-colors">
                    <td class="py-4 px-6">R$ 150,00</td>
                    <td class="py-4 px-6">14/09/2025</td>
                    <td class="py-4 px-6">Compra de material de escritório</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-600">Baixa</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-700 transition-colors">
                    <td class="py-4 px-6">R$ 320,00</td>
                    <td class="py-4 px-6">12/09/2025</td>
                    <td class="py-4 px-6">Compra de equipamento eletrônico</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-500">Regular</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-700 transition-colors">
                    <td class="py-4 px-6">R$ 75,00</td>
                    <td class="py-4 px-6">10/09/2025</td>
                    <td class="py-4 px-6">Alimentação</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-red-600">Elevada</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
