<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Http\Requests\Compra\StoreRequest;
use App\Models\Compra;
use App\Http\Requests\Compra\UpdateRequest;

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
public function store(StoreRequest $request)
{
    $usuario = auth()->user();

    $usuario->compras()->create($request->validated());

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

public function update(UpdateRequest $request, $id)
{
    $compra = Compra::findOrFail($id);

    $compra->update($request->validated());

    return redirect()->route('indexCompra')
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
