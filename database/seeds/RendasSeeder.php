<?php

use Illuminate\Database\Seeder;
use App\rendas;

class RendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rendas::create([
            'valorPagar' => '10000',
            'dataPagamento' => '2019-11-02',
            'metodoPagamento' => '2',
            'valorPago' => '50000',
            'valorDivida' => '5000',
            'estado' => '1',
            'dataLimitePagamento' => '2019-11-02',
            'notas' => 'Nao ha notas',
            'dataRecibo' => '2019-11-04'
        ]);
    }
}
