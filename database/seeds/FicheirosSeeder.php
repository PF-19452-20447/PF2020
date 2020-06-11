<?php

use Illuminate\Database\Seeder;
use App\Ficheiro;

class FicheirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ficheiro::create([
            'foto'      => 'foto1.png',
            'descricao' => 'Foto da cozinha'

        ]);
    }
}
