<?php

use Illuminate\Database\Seeder;
use App\ficheiros;

class FicheirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ficheiros::create([
            'foto'      => 'foto1.png',
            'descricao' => 'Foto da cozinha'
        ]);
    }
}
