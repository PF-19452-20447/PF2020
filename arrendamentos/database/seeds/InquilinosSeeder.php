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
            'nome'      => 'Eusebio ',
            'data_nascimento' => '2018-08-25',
            'idade' => '23',
            'NIF' => '32743892464783920',
            'CC' => '437289476473829',
            'email'     => 'eusebio@gmail.com',
            'telefone' => '6437283476',
            'morada' => 'Rua do Eusebio',
            'IBAN' => '47382937648392',
            'tipo_particular_empresa' => '3',
            'profissao' => 'Agricultor',
            'vencimento' => '2',
            'tipo_contrato' => 'semestral',
            'notas' => 'nada a acrescentar',
            'cae' => '3',
            'capital_social' => '2',
            'setor_actividade' => 'Agricultura',
            'certidao_permanente' => 'certidao',
            'num_funcionarios' => '4'

        ]);

    }
}
