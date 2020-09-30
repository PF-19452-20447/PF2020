<?php

use Illuminate\Database\Seeder;
use App\Renda;

class RendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Renda::create([
            'valorPagar' => '10000',
            'dataPagamento' => '2019-11-02',
            'metodoPagamento' => '6',
            'valorPago' => '50000',
            'valorDivida' => '5000',
            'estado' => '1',
            'dataLimitePagamento' => '2019-11-02',
            'notas' => 'Nao tem notas adicionais',
            'dataRecibo' => '2019-11-04'
        ]);
    }
}
