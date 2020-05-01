<?php

use Illuminate\Database\Seeder;
use App\proprietarios_imoveis;

class proprietarios_imoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        proprietarios_imoveis::create([
            'proprietario_id' => '1',
            'imovel_id' => '1'
        ]);
    }
}
