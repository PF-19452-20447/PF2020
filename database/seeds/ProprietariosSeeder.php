<?php

use App\Proprietario;
use Illuminate\Database\Seeder;

class ProprietariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proprietario::create([
            'nome'      => 'Beatriz',
            'dataNascimento' => '1999-02-21',
            'nif' => '23453234',
            'cc' => '234565432',
            'email'     => 'beatriz@gmail.com',
            'telefone' => '243223456543',
            'morada' => 'Rua da Beatriz',
            'iban' => '7654876543',
            'tipoParticularEmpresa' => '4',
            'cae' => '2',
            'capitalSocial' => '1',
            'setorActividade' => 'Professora',
            'certidaoPermanente' => 'certidao',
            'numFuncionarios' => '4'


        ]);
    }
}
