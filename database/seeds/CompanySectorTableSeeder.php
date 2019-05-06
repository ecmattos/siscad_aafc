<?php

use Illuminate\Database\Seeder;

class CompanySectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_sectors =
        [
            [
                'code'        => 'PRE',
                'description' => 'PRESIDENCIA'
            ],
            [
                'code'        => 'TES',
                'description' => 'TESOURARIA'
            ],
            [
                'code'        => 'COZ',
                'description' => 'COZINHA'
            ],
            [
                'code'        => 'ADM',
                'description' => 'ADMINISTRATIVO'
            ]
        ];
    
        foreach ($company_sectors as $company_sector)
        {
            \SisCad\Entities\CompanySector::create($company_sector);
        }
    }
}

