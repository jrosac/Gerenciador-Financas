<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Compra;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Requests\Usuario\StoreRequest;
use App\Http\Requests\Usuario\UpdateRequest;


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

public function store(StoreRequest $request)
{
    DB::beginTransaction();
    try {
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
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

public function update(UpdateRequest $request)
{
    $usuario = Auth::user();

    // Atualiza os campos validados
    $usuario->update($request->validated());

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

    public function relatorio()
{
    $usuario = Auth::user();
    $compras = $usuario->compras()->get();

    // -----------------------------
    // Gráfico de barras - Gastos por mês
    // -----------------------------
    $valoresPorMes = array_fill(1, 12, 0);
    foreach ($compras as $compra) {
        $mes = Carbon::parse($compra->data_compra)->month; // número do mês (1-12)
        $valoresPorMes[$mes] += $compra->valor;
    }

    $chartBarra = (new LarapexChart)->barChart()
        ->setTitle('Gastos - 2025')
        ->setSubtitle('Valores em reais')
        ->addData('Gastos', array_values($valoresPorMes))
        ->setXAxis([
            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
        ])
        ->setColors(['#10B981'])
        ->setDataLabels(true)
        ->setHeight(500)
        ->setGrid();

    // -----------------------------
    // Gráfico de pizza - Faixa de valor
    // -----------------------------
    $contagem = [
        'Alta (>50)' => 0,
        'Normal (20-50)' => 0,
        'Baixa (<20)' => 0,
    ];

    foreach ($compras as $compra) {
        if ($compra->valor > 50) {
            $contagem['Alta (>50)']++;
        } elseif ($compra->valor >= 20) {
            $contagem['Normal (20-50)']++;
        } else {
            $contagem['Baixa (<20)']++;
        }
    }

    $chartPizza = (new LarapexChart)->pieChart()
        ->setTitle('Distribuição de Compras por Valor')
        ->setSubtitle('Quantidade de compras por faixa de valor')
        ->addData(array_values($contagem))
        ->setLabels(array_keys($contagem))
        ->setColors(['#EF4444', '#F59E0B', '#10B981']); // Alta-vermelho, Normal-laranja, Baixa-verde

    // -----------------------------
    // Gráfico de linha - Gastos por dia do mês atual
    // -----------------------------
    $diasNoMes = Carbon::now()->daysInMonth; // número de dias no mês atual
    $valoresPorDia = array_fill(1, $diasNoMes, 0);

    foreach ($compras as $compra) {
        $data = Carbon::parse($compra->data_compra);
        if ($data->month == Carbon::now()->month && $data->year == Carbon::now()->year) {
            $valoresPorDia[$data->day] += $compra->valor;
        }
    }

    $chartLinha = (new LarapexChart)->lineChart()
        ->setTitle('Gastos do Mês Atual')
        ->setSubtitle('Valores por dia')
        ->addData('Gastos', array_values($valoresPorDia))
        ->setXAxis(range(1, $diasNoMes))
        ->setColors(['#3B82F6'])
        ->setDataLabels(true)
        ->setHeight(400)
        ->setGrid();

    // -----------------------------
    // Retorna a view com todos os gráficos
    // -----------------------------
    return view('usuario.dashboards', compact('chartBarra', 'chartPizza', 'chartLinha'));
}

public function generatePdf()
{
    $usuario = Auth::user();

    // Compras do ano atual
    $compras = $usuario->compras()->orderBy('created_at', 'desc')->get();

    // Compras do mês atual
    $mesAtual = now()->month;
    $anoAtual = now()->year;
    $comprasMensais = $compras->where('created_at.month', $mesAtual);

    // Relatório anual: total gasto por mês
    $gastosPorMes = [];
    for ($m = 1; $m <= 12; $m++) {
        $gastosPorMes[$m] = $compras->filter(function($c) use ($m, $anoAtual) {
            return $c->created_at->month == $m && $c->created_at->year == $anoAtual;
        })->sum('valor');
    }

    $totalGastoMensal = $comprasMensais->sum('valor');
    $quantidadeComprasMensal = $comprasMensais->count();

    $pdf = app('dompdf.wrapper');
    $pdf->loadView('usuario.relatorioPdf', compact(
        'usuario',
        'comprasMensais',
        'totalGastoMensal',
        'quantidadeComprasMensal',
        'gastosPorMes',
        'anoAtual'
    ));

    return $pdf->download('relatorio_compras_' . now()->format('Y_m_d') . '.pdf');
}


}
