<?php

use Illuminate\Database\Seeder;

class CompanyPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_positions =
        [
            [
                'code'        => 'ENG',
                'description' => 'ENGENHEIRO(A)'
            ],
            [
                'code'        => 'ADM',
                'description' => 'ADMINISTRADOR(A)'
            ],
            [
                'code'        => 'CON',
                'description' => 'CONTADOR(A)'
            ]
        ];
    
        foreach ($company_positions as $company_position)
        {
            \SisCad\Entities\CompanyPosition::create($company_position);
        }
    }
}

