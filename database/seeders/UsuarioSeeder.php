<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
                'nome' => 'João Conceição',
                'email' => 'jrosac@me.com',
                'senha' => bcrypt('senha123'),
            ]);
    }
}
