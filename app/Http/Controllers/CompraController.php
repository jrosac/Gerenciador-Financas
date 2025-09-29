<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\Compra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $usuario = Auth::user();


    $compras = $usuario->compras()->get();




    return view('usuario.indexCompra', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $formas_pagamento = FormaPagamento::all();


        return view('usuario/createCompra',compact('categorias','formas_pagamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos da compra
        $request->validate([
            'descricao' => 'nullable|string|max:255',
            'valor' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'data_compra' => 'required|date',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id'
]);

        // Cria a compra vinculada ao usuário autenticado
        $usuario = Auth::user();
        $usuario->compras()->create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data_compra' => $request->data_compra,
            'categoria_id' => $request->categoria_id,
            'forma_pagamento_id' => $request->forma_pagamento_id,
        ]);

        return redirect()->route('home')
                         ->with('success', 'Compra criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $compra = Compra::with(['categoria', 'formaPagamento'])->findOrFail($id);

    // Carrega todas categorias e formas de pagamento para popular os selects
    $categorias = Categoria::all();
    $formas_pagamento = FormaPagamento::all();

    return view('usuario.showCompra', compact('compra', 'categorias', 'formas_pagamento'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'valor' => 'required|numeric',
            'data_compra' => 'required|date',
            'descricao' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id',
        ]);

        // Busca a compra
        $compra = Compra::findOrFail($id);

        // Atualiza os campos
        $compra->valor = $request->valor;
        $compra->data_compra = $request->data_compra;
        $compra->descricao = $request->descricao;
        $compra->categoria_id = $request->categoria_id;
        $compra->forma_pagamento_id = $request->forma_pagamento_id;

        $compra->save();

        // Redireciona de volta para o show com mensagem de sucesso
        return redirect()->route('perfilCompra', $compra->id)
                         ->with('success', 'Compra atualizada com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compa= Compra::findOrFail($id);
        $compa->delete();
        return redirect()->route('indexCompra')
                         ->with('success', 'Compra deletada com sucesso!');
    }


}
