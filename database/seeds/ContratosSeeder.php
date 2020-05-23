<?php

use Illuminate\Database\Seeder;
use App\contratos;

class ContratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contratos::create([
            'valorRenda' => '100000',
            'tipoContrato' => 'anual',
            'inicioContrato' => '2019-07-12 11:21:33',
            'fimContrato' => '2020-11-03 12:32:11',
            'renovavel'     => '1',
            'isencaoBeneficio' => 'isencao ate 2 anos',
            'retencaoFonte' => 'Nao recebeu a totalidade do pagmento',
            'dataLimitePagamento' => '2020-11-02 11:00:00',
            'estado' => '2',
            'encargos' => 'encargo',
            'caucao' => '100',
            'metodoPagamento' => '1',
            'rendasAvanco' => 'Nao tem rendas em avanço'
        ]);
    }
}
