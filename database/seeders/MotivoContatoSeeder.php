<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::updateOrCreate(['motivo_contato' => 'Dúvida']);
        MotivoContato::updateOrCreate(['motivo_contato' => 'Elogio']);
        MotivoContato::updateOrCreate(['motivo_contato' => 'Reclamação']);
    }
}
