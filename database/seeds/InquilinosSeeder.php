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

        $inquilino=Inquilino::create([
            'nome' => 'Daniela',
            'dataNascimento' => '1998-02-27',
            'nif' => '234323456',
            'cc' => '234532456',
            'email' => 'daniela@gmail.com',
            'telefone' => '915323445',
            'morada' => 'Rua da daniela',
            'iban' => 'pt50373673322343434',
            'tipoParticularEmpresa' => '4',
            'profissao' => 'Engenheira',
            'tipoContrato' => '9',
            'notas' => 'nada a acrescentar',
            'cae' => '1',
            'setorActividade' => '5',
            'certidaoPermanente' => '5325256',
            'numFuncionarios' => '3'
        ]);
        App\Proprietario::find(1)->inquilinos()->attach($inquilino->id);
    }
}
