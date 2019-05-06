<?php

use Illuminate\Database\Seeder;

class PartnerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner_types =
        [
            [
                'code'        => 'COR',
                'description' => 'CORSAN'
            ],
            [
                'code'        => 'OUT',
                'description' => 'OUTROS'
            ],
            [
                'code'        => 'FCOR',
                'description' => 'FUNCORSAN'
            ]
        ];
    
        foreach ($partner_types as $partner_type)
        {
            \SisCad\Entities\PartnerType::create($partner_type);
        }
    }
}

