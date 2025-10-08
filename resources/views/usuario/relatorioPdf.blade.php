<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        .usuario-info {
            margin-bottom: 20px;
        }
        .usuario-info p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .summary {
            text-align: right;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 40px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Relatório de Compras</h1>

    <div class="usuario-info">
        <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Data do Relatório:</strong> {{ now()->format('d/m/Y H:i') }}</p>
    </div>


<h2>Relatório Mensal - {{$mesAtual}}</h2>
<p><strong>Total Gasto:</strong> R$ {{ number_format($totalGastoMensal, 2, ',', '.') }}</p>
<p><strong>Quantidade de Compras:</strong> {{ $quantidadeComprasMensal }}</p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Data</th>
            <th>Descrição</th>
            <th>Valor (R$)</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comprasMensais as $index => $compra)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $compra->created_at->format('d/m/Y') }}</td>
                <td>{{ $compra->descricao ?? $compra->nome ?? 'Compra' }}</td>
                <td>{{ number_format($compra->valor, 2, ',', '.') }}</td>
                <td>{{ $compra->categoria->nome ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Relatório Anual - {{ $anoAtual }}</h2>
<table>
    <thead>
        <tr>
            <th>Mês</th>
            <th>Total Gasto (R$)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gastosPorMes as $mes => $valor)
            <tr>
                <td>{{ \Carbon\Carbon::create($anoAtual, $mes, 1)->translatedFormat('F') }}</td>
                <td>{{ number_format($valor, 2, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
