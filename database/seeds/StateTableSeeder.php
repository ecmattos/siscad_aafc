<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states =
        [
            [
                'code'        => 'RS',
                'description' => 'RIO GRANDE DO SUL'
            ],
            [
                'code'        => 'PR',
                'description' => 'PARANA'
            ],
            [
                'code'        => 'RJ',
                'description' => 'RIO DE JANEIRO'
            ],
            [
                'code'        => 'SC',
                'description' => 'SANTA CATARINA'
            ],
            [
                'code'        => 'SP',
                'description' => 'SAO PAULO'
            ]
        ];
    
        foreach ($states as $state)
        {
            \SisCad\Entities\State::create($state);
        }
    }
}

