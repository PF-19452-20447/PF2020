<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use App\Inquilinos;

class InquilinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Inquilinos::create([
            'nome'      => 'Tomas ',
            'data_nascimento' => '1996-08-03',
            'idade' => '24',
            'NIF' => '',
            'CC' => '53627893',
            'email'     => 'tomas@gmail.com',
            'telefone' => '362834234',
            'morada' => 'Rua do Tomas',
            'IBAN' => '46328347',
            'tipo_particular_empresa' => '2',
            'profissao' => 'Engenheiro',
            'vencimento' => '3',
            'tipo_contrato' => 'anual',
            'notas' => 'nada a acrescentar',
            'cae' => '1',
            'capital_social' => '4',
            'setor_actividade' => 'Engenharia',
            'certidao_permanente' => 'certidao',
            'num_funcionarios' => '4'

        ]);

    }
}
