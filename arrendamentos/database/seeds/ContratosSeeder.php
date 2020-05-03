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
            'valor_renda' => '100000',
            'tipo_contrato' => 'anual',
            'inicio_contrato' => '2019-07-12 11:21:33',
            'fim_contrato' => '2020-11-03 12:32:11',
            'renovavel'     => '1',
            'isencao_beneficio' => 'isencao ate 2 anos',
            'retencao_fonte' => 'Nao recebeu a totalidade do pagmento',
            'data_limite_pagamento' => '2020-11-02 11:00:00',
            'estado' => '2',
            'encargos' => 'encargo',
            'caucao' => '100',
            'metodo_pagamento' => '1',
            'rendas_avanco' => 'Nao tem rendas em avanço'
        ]);
    }
}
