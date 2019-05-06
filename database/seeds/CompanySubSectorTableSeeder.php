<?php

use Illuminate\Database\Seeder;

class CompanySubSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_sub_sectors =
        [
            [
                'code'        => 'SL1',
                'description' => 'SALA 01'
            ],
            [
                'code'        => 'SL2',
                'description' => 'SALA 02'
            ],
            [
                'code'        => 'AUD',
                'description' => 'AUDITORIO'
            ],
            [
                'code'        => 'SLR',
                'description' => 'SALA REUNIOES'
            ]
        ];
    
        foreach ($company_sub_sectors as $company_sub_sector)
        {
            \SisCad\Entities\CompanySubSector::create($company_sub_sector);
        }
    }
}

