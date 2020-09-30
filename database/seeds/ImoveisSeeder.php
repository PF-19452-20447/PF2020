<?php

use Illuminate\Database\Seeder;
use App\Imovel;

class ImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $imovel = Imovel::create([
            'tipo'      => '6',
            'tipologia' => '12',
            'area' => '100',
            'morada' => 'Rua Agostinho Sá',
            'numQuartos' => '3',
            'numCasaBanho' => '2',
            'descricao' => 'É um apartamento que se situa ao pé do mar',
            'estado' => '1',
            'mobilado' => '4',
            'fumar' => '4',
            'animaisEstimacao' => '5',
            'outrosEquipamentos' => 'Estores electricos',
            'certificadoEnergetico' => '22',
            'licencaHabitacao' => '232431',
            'notas' => 'Nada a acrescentar de momento',
            'televisao' => '4',
            'frigorifico' => '4',
            'piscina' => '4',
            'varanda' => '4',
            'terraco' => '4',
            'churrasqueira' => '4',
            'arCondicionado' => '4'
        ]);
        App\Proprietario::find(1)->imoveis()->attach($imovel->id);
    }
}
