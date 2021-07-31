<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\FornecedorSeeder;
use Database\Seeders\MotivoContatoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FornecedorSeeder::class);
        $this->call(MotivoContatoSeeder::class);
        $this->call(SiteContatoSeeder::class);
    }
}
