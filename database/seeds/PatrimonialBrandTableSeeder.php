<?php

use Illuminate\Database\Seeder;

class PatrimonialBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_brands =
        [
            [
                'code'        => 'LG',
                'description' => 'LG'
            ],
            [
                'code'        => 'CON',
                'description' => 'CONSUL'
            ],
            [
                'code'        => 'HP',
                'description' => 'HP'
            ],
            [
                'code'        => 'DEL',
                'description' => 'DELL'
            ],
            [
                'code'        => 'FIA',
                'description' => 'FIAT'
            ],
            [
                'code'        => 'VW',
                'description' => 'VW'
            ],
            [
                'code'        => 'SAM',
                'description' => 'SAMSUNG'
            ],
            [
                'code'        => 'ACE',
                'description' => 'ACER'
            ]
        ];
    
        foreach ($patrimonial_brands as $patrimonial_brand)
        {
            \SisCad\Entities\PatrimonialBrand::create($patrimonial_brand);
        }
    }
}

