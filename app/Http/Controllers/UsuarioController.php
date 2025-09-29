<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Compra;


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
        $quantidadeCompras = $compras->count();

        $agora = Carbon::now();
        $totalMes = Compra::where('usuario_id', $usuario->id)
        ->whereMonth('data_compra', $agora->month)
        ->whereYear('data_compra', $agora->year)
        ->sum('valor');

         $ultimasCompras = Compra::where('usuario_id', $usuario->id)
        ->latest() // mesma coisa que ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();




        return view('usuario.home', compact('usuario', 'compras', 'valorTotalCompras','quantidadeCompras',  'totalMes','ultimasCompras'));
    }

    public function showPerfil(){
        $usuario = Auth::user();

        return view('usuario.showUser', compact('usuario'));
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
    public function update(Request $request)
    {
        $usuario = Auth::user(); // Sempre o próprio usuário

        // Validação
        $request->validate([
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
        ]);

        // Atualiza os campos
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->save();

        // Redireciona de volta com mensagem de sucesso
        return redirect()->route('perfil')
                         ->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
