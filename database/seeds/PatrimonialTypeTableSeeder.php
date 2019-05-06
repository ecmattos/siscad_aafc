<?php

use Illuminate\Database\Seeder;

class PatrimonialTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_types =
        [
            [
                'code'        => 'MEC',
                'description' => 'MECANICO'
            ],
            [
                'code'        => 'ELE',
                'description' => 'ELETRICO'
            ],
            [
                'code'        => 'CLI',
                'description' => 'CLIMATIZACAO'
            ],
            [
                'code'        => 'INF',
                'description' => 'INFORMATICA'
            ]
        ];
    
        foreach ($patrimonial_types as $patrimonial_type)
        {
            \SisCad\Entities\PatrimonialType::create($patrimonial_type);
        }
    }
}

