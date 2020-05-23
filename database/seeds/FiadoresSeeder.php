<?php

use Illuminate\Database\Seeder;
use App\Fiadores;

class FiadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fiadores::create([
            'nome' => 'xpto1',
            'dataNascimento' => '1992-02-11',
            'nif' => '2345687654345678',
            'cc' => '654345654',
            'email' => 'xpto1@gmail.com',
            'telefone' => '9876543456',
            'morada' => 'Rua do XPTO1',
            'iban' => '6543465432',
            'tipoParticularEmpresa' => '3',
            'cae' => '1',
            'capitalSocial' => '3',
            'setorActividade' => 'Agricultura',
            'certidaoPermanente' => 'certidao',
            'numFuncionarios' => '2'

        ]);
    }
}
