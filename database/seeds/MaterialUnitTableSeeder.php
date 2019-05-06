<?php

use Illuminate\Database\Seeder;

class MaterialUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material_units =
        [
            [
                'code'        => 'M',
                'description' => 'METRO LINEAR'
            ],
            [
                'code'        => 'M2',
                'description' => 'METRO QUADRADO'
            ],
            [
                'code'        => 'M3',
                'description' => 'METRO CUBICO'
            ],
            [
                'code'        => 'PC',
                'description' => 'PECA'
            ],
            [
                'code'        => 'L',
                'description' => 'LITRO'
            ],
            [
                'code'        => 'KG',
                'description' => 'QUILOGRAMA'
            ],
            [
                'code'        => 'G',
                'description' => 'GRAMA'
            ],
            [
                'code'        => 'FL',
                'description' => 'FOLHA'
            ]
        ];
    
        foreach ($material_units as $material_unit)
        {
            \SisCad\Entities\MaterialUnit::create($material_unit);
        }
    }
}

