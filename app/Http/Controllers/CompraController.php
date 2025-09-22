<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'descricao' => 'string|max:255',
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
