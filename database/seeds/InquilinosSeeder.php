<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use App\Inquilino;

class InquilinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Inquilino::create([
            'nome'      => 'Daniela ',
            'dataNascimento' => '1998-02-27',
            'nif' => '234323456543',
            'cc' => '234532456',
            'email'     => 'daniela@gmail.com',
            'telefone' => '34532345',
            'morada' => 'Rua da daniela',
            'iban' => '2343434',
            'tipoParticularEmpresa' => '3',
            'profissao' => 'Engenheira',
            'vencimento' => '2',
            'tipoContrato' => 'anual',
            'notas' => 'nada a acrescentar',
            'cae' => '1',
            'capitalSocial' => '3',
            'setorActividade' => 'Engenharia',
            'certidaoPermanente' => 'certidao',
            'numFuncionarios' => '2'

        ]);

    }
}
