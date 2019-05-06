<?php

use Illuminate\Database\Seeder;

class PatrimonialSubTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_sub_types =
        [
            [
                'code'        => 'MET',
                'description' => 'MOTOR ELETRICO'
            ],
            [
                'code'        => 'BOC',
                'description' => 'BOMBA CENTRIFUGA'
            ],
            [
                'code'        => 'VR',
                'description' => 'VALVULA RETENCAO'
            ],
            [
                'code'        => 'AUT',
                'description' => 'AUTOMOVEL'
            ],
            [
                'code'        => 'CPU',
                'description' => 'CPU'
            ],
            [
                'code'        => 'MON',
                'description' => 'MONITOR'
            ],
            [
                'code'        => 'IMP',
                'description' => 'IMPRESSORA'
            ],
            [
                'code'        => 'ACJ',
                'description' => 'AR COND JANELA'
            ],
            [
                'code'        => 'ACS',
                'description' => 'AR COND SPLIT'
            ],
            [
                'code'        => 'CAM',
                'description' => 'CAMINHAO'
            ],
            [
                'code'        => 'RET',
                'description' => 'RETROESCAVADEIRA'
            ],
            [
                'code'        => 'TRF',
                'description' => 'TRANSFORMADOR'
            ]
        ];
    
        foreach ($patrimonial_sub_types as $patrimonial_sub_type)
        {
            \SisCad\Entities\PatrimonialSubType::create($patrimonial_sub_type);
        }
    }
}

