<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formas_pagamento')->insert([
            ['nome' => 'Dinheiro'],
            ['nome' => 'Cartão de Crédito'],
            ['nome' => 'Cartão de Débito'],
            ['nome' => 'Pix'],
            ['nome' => 'Boleto'],
        ]);
    }
}
