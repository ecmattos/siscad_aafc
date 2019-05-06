<?php

use Illuminate\Database\Seeder;

class PatrimonialMovementTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_movement_types =
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
    
        foreach ($patrimonial_movement_types as $patrimonial_movement_type)
        {
            \SisCad\Entities\PatrimonialMovementType::create($patrimonial_movement_type);
        }
    }
}

