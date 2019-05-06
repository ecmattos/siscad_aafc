<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders =
        [
            [
                'code'        => 'M',
                'description' => 'MASCULINO'
            ],
            [
                'code'        => 'F',
                'description' => 'FEMININO'
            ]
        ];
    
        foreach ($genders as $gender)
        {
            \SisCad\Entities\Gender::create($gender);
        }
    }
}

