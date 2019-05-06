<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans =
        [
            [
                'code'        => 'PAE',
                'description' => 'ESPECIAL'
            ],
            [
                'code'        => 'PAN',
                'description' => 'NORMAL'
            ]
        ];
    
        foreach ($plans as $plan)
        {
            \SisCad\Entities\Plan::create($plan);
        }
    }
}

