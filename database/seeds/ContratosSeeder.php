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
        $contracto = Contrato::create([
            'valorRenda' => '100',
            'tipoContrato' => '12',
            'inicioContrato' => '2019-07-12',
            'fimContrato' => '2020-11-03',
            'renovavel'     => '9',
            'retencaoFonte' => '15',
            'diaLimitePagamento' => '29',
            'estado' => '1',
            'encargos' => 'nao tem encargos',
            'caucao' => '100',
            'metodoPagamento' => '5',
            'rendasAvanco' => '19'
        ]);
        $contracto->metodoPagamento = Contrato::PAGAMENTO_MULTIBANCO;
        $contracto->estado= Contrato::ESTADO_ATIVO;
        $contracto->save();
        $contracto->inquilinos()->attach(1);
        $contracto->fiadores()->attach(1);
        App\Imovel::find(1)->contrato()->save($contracto);
    }
}
