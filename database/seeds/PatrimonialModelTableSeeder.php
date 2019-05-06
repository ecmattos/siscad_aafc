<?php

use Illuminate\Database\Seeder;

class PatrimonialModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_models =
        [
            [
                'code'        => 'AS',
                'description' => '18000BTU AR18H'
            ],
            [
                'code'        => 'WWW',
                'description' => '17POL'
            ],
            [
                'code'        => 'HP',
                'description' => '10,00CV 280SM 380/220V 4P'
            ],
            [
                'code'        => 'DEL',
                'description' => 'MODELO 01'
            ],
            [
                'code'        => 'FIA',
                'description' => 'MODELO 02'
            ],
            [
                'code'        => 'VW',
                'description' => 'MODELO 03'
            ],
            [
                'code'        => 'SAM',
                'description' => 'MODELO 04'
            ],
            [
                'code'        => 'ACE',
                'description' => 'MODELO 05'
            ]
        ];
    
        foreach ($patrimonial_models as $patrimonial_model)
        {
            \SisCad\Entities\PatrimonialModel::create($patrimonial_model);
        }
    }
}

