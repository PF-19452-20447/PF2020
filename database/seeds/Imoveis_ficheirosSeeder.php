<?php

use Illuminate\Database\Seeder;
use App\imoveis_ficheiros;

class Imoveis_ficheirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       imoveis_ficheiros::create([
            'imovel_id' => '1',
            'ficheiro_id' => '1'
        ]);
    }
}
