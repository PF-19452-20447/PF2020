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
        $contrato = App\Contrato::find(1);
        $inquilino = App\Inquilino::find(1);
        $proprietario = App\Proprietario::find(1);
        $renda = Renda::create([
            'valorPagar' => $contrato->valorRenda,
            'dataPagamento' => '2019-11-02',
            'metodoPagamento' => '6',
            'valorPago' => '50000',
            'valorDivida' => '5000',
            'estado' => '1',
            'dataLimitePagamento' => '2019-11-02',
            'notas' => 'Nao tem notas adicionais',
            'dataRecibo' => '2019-11-04'
        ]);
        $contrato->rendas()->save($renda);
        $inquilino->rendas()->save($renda);
        $proprietario->rendas()->save($renda);
    }
}
