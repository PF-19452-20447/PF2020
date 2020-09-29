<?php

use Illuminate\Database\Seeder;
use App\Contrato;

class ContratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrato::create([
            'valorRenda' => '100',
            'tipoContrato' => '12',
            'inicioContrato' => '2019-07-12',
            'fimContrato' => '2020-11-03',
            'renovavel'     => '9',
            //'isencaoBeneficio' => 'isencao ate 2 anos',
            'retencaoFonte' => '15',
            'diaLimitePagamento' => '29',
            'estado' => '1',
            'encargos' => 'nao tem encargos',
            'caucao' => '100',
            'metodoPagamento' => '5',
            'rendasAvanco' => '19'
        ]);
    }
}
