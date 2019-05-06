<?php

use Illuminate\Database\Seeder;

class AccountCoverageTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_coverage_types =
        [
            [
                'code'        => 'S',
                'description' => 'SINTETICA'
            ],
            [
                'code'        => 'A',
                'description' => 'ANALITICA'
            ]
        ];
    
        foreach ($account_coverage_types as $account_coverage_type)
        {
            \SisCad\Entities\AccountCoverageType::create($account_coverage_type);
        }
    }
}

