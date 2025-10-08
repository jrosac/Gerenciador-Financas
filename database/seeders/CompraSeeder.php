<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compras')->insert([
            [
                'descricao' => 'Compra de supermercado',
                'valor' => 150.75,
                'data_compra' => '2024-09-01',
                'categoria_id' => 1, // Alimentação
                'forma_pagamento_id' => 1, // Dinheiro
                'usuario_id' => 1, // João Conceição
            ],
            [
                'descricao' => 'Passagem de ônibus',
                'valor' => 3.50,
                'data_compra' => '2024-09-02',
                'categoria_id' => 2, // Transporte
                'forma_pagamento_id' => 3, // Cartão de Débito
                'usuario_id' => 1, // João Conceição
            ],
            [
                'descricao' => 'Consulta médica',
                'valor' => 200.00,
                'data_compra' => '2024-09-03',
                'categoria_id' => 3, // Saúde
                'forma_pagamento_id' => 4, // Pix
                'usuario_id' => 1, // João Conceição
            ],
        ]);
    }
}
