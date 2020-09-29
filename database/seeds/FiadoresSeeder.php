<?php

use Illuminate\Database\Seeder;
use App\Fiador;

class FiadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fiador::create([
            'nome' => 'Rui',
            'dataNascimento' => '1992-02-11',
            'nif' => '234568765',
            'cc' => '654345654',
            'email' => 'rui@gmail.com',
            'telefone' => '967654345',
            'morada' => 'Rua do XPTO1',
            'iban' => 'pt506543465432',
            'tipoParticularEmpresa' => '4',
            'cae' => '1',
            'setorActividade' => '6',
            'certidaoPermanente' => '234521',
            'numFuncionarios' => '1'

        ]);
    }
}
