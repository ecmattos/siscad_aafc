<?php

use Illuminate\Database\Seeder;

class PatrimonialStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_statuses =
        [
            [
                'code'        => 'RES',
                'description' => 'RESERVA'
            ],
            [
                'code'        => 'ATI',
                'description' => 'ATIVO'
            ],
            [
                'code'        => 'MAN',
                'description' => 'MANUTENCAO'
            ],
            [
                'code'        => 'DES',
                'description' => 'DESATIVADO'
            ],
            [
                'code'        => 'BX',
                'description' => 'BAIXADO'
            ]
        ];
    
        foreach ($patrimonial_statuses as $patrimonial_status)
        {
            \SisCad\Entities\PatrimonialStatus::create($patrimonial_status);
        }
    }
}

