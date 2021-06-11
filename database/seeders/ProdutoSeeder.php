<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Camiseta Polo',
            'preco' => 100,
            'estoque' => 4,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Calça Jeans',
            'preco' => 120,
            'estoque' => 4,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Camiseta Manga Longa',
            'preco' => 80,
            'estoque' => 4,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'PC game',
            'preco' => 5000,
            'estoque' => 4,
            'categoria_id' => 2
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Mouse',
            'preco' => 30,
            'estoque' => 4,
            'categoria_id' => 6
        ]);
    }
}
