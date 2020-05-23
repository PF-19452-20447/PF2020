<?php

use Illuminate\Database\Seeder;
use App\contrato_inquilino;

class contratos_inquilinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       contrato_inquilino::create([
            'contrato_id' => '1',
            'inquilino_id' => '1'
        ]);
    }
}
