<?php

use Illuminate\Database\Seeder;
use App\imoveis;

class ImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Imoveis::create([
            'tipo'      => 'apartamento',
            'tipologia' => 'T3',
            'area' => '100',
            'morada' => 'Rua Agostinho Sá',
            'numQuartos'     => '3',
            'numCasaBanho' => '2',
            'descricao' => 'É um apartamento que se situa ao pé do mar',
            'estado' => '1',
            'mobilado' => '1',
            'fumar' => '0',
            'animaisEstimacao' => '1',
            'outrosEquipamentos' => 'Estores electricos',
            'certificadoEnergetico' => 'Com certificado',
            'licencaHabitacao' => 'Com lincença',
            'notas' => 'Nada a acrescentar de momento',
            'televisao' => '1',
            'frigorifico' => '1',
            'piscina' => '1',
            'varanda' => '1',
            'terraco' => '0',
            'churrasqueira' => '0',
            'arCondicionado' => '1'
        ]);
    }
}
