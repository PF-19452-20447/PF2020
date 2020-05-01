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
            'nome' => 'Elsa',
            'data_nascimento' => '1997-06-24',
            'idade' => '24',
            'NIF' => '44632834678',
            'CC' => '462347238',
            'email' => 'elsa@gmail.com',
            'telefone' => '34738923478',
            'morada' => 'Rua da Elsa',
            'IBAN' => '4738948792',
            'tipo_particular_empresa' => '3',
            'cae' => '2',
            'capital_social' => '2',
            'setor_actividade' => 'Agricultura',
            'certidao_permanente' => 'certidao',
            'num_funcionarios' => '2'

        ]);
    }
}
