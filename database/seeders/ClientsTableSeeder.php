<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            ['name' => 'Drummond', 'logo' => 'clientes/drummond.png'],
            ['name' => 'Parko Services', 'logo' => 'clientes/parko-services.png'],
            ['name' => 'Drummond Energy', 'logo' => 'clientes/drummond-energy.png'],
        ]);
    }
}
