<?php

use Illuminate\Database\Seeder;

class CompanyResponsibilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_resposibilities =
        [
            [
                'code'        => 'TES',
                'description' => 'CHEFE TESOURARIA'
            ],
            [
                'code'        => 'CFI',
                'description' => 'CHEFE ADMINISTRATIVO'
            ],
            [
                'code'        => 'PRE',
                'description' => 'PRESIDENTE'
            ],
            [
                'code'        => 'VCE',
                'description' => 'VICE-PRESIDENTE'
            ]
        ];
    
        foreach ($company_resposibilities as $company_resposibility)
        {
            \SisCad\Entities\CompanyPosition::create($company_resposibility);
        }
    }
}

