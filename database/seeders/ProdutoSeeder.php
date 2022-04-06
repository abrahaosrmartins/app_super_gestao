<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::factory()->create();
        Produto::updateOrCreate([
            'nome' => 'Smart Tv',
            'descricao' => 'Smart Tv Led 43"',
            'peso' => 8,
            'unidade_id' => 1
        ]);
    }
}
