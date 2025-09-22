<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
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
            return view('credenciamento.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    // Validação dos campos
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email',
        'senha' => 'required|string|min:8|confirmed', // usa senha_confirmation automaticamente
    ]);

    DB::beginTransaction();
    try {
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha), // Hash da senha
        ]);

        DB::commit();
        return redirect()->route('welcome')->with('success', 'Usuário cadastrado com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Erro ao cadastrar usuário: ' . $e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $usuario = Auth::user();
        $idUsuario = $usuario->id;
        $compras = $usuario->compras;
        $valorTotalCompras = $compras->sum('valor');



        return view('usuario.home', compact('usuario', 'compras', 'valorTotalCompras'));
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
