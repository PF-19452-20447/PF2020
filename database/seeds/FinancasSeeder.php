<?php

use Illuminate\Database\Seeder;
use App\Financa;

class FinancasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Financa::create([
            'valorAvaliacao' => '10000',
            'dataAvaliacao' => '2020-03-20 12:34:54',
            'encargos' => 'tem encargos',
            'imi' => '102',
            'condominio'     => 'condominio do jardim das rosas',
            'dataAquisicao' => '2020-02-01 11:23:44',
            'precoCompra' => '100',
            'custosAquisicao' => '1000',
            'certificados' => 'Com certificados',
            'seguros' => 'Com seguros',
            'documentosAnexar' => 'Nada a anexar',
            'notas' => 'Para já nada a anotar',
        ]);
    }
}
