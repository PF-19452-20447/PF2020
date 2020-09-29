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
            'valorRenda' => '100000',
            'tipoContrato' => 'anual',
            'inicioContrato' => '2019-07-12',
            'fimContrato' => '2020-11-03',
            'renovavel'     => '5',
            'isencaoBeneficio' => 'isencao ate 2 anos',
            'retencaoFonte' => 'Nao recebeu a totalidade do pagmento',
            'diaLimitePagamento' => '12',
            'estado' => '2',
            'encargos' => 'encargo',
            'caucao' => '100',
            'metodoPagamento' => '7',
            'rendasAvanco' => 'Nao tem rendas em avanço'
        ]);
    }
}
