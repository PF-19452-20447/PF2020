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

        $inquilino = Inquilino::create([
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
            'tipoContrato' => 'anual',
            'notas' => 'nada a acrescentar',
            'cae' => '1',
            'setorActividade' => 'Engenharia',
            'certidaoPermanente' => 'certidao',
            'numFuncionarios' => '2'

        ]);
        App\Proprietario::find(1)->inquilinos()->attach($inquilino->id);
    }
}
