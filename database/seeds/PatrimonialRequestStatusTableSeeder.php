<?php

use Illuminate\Database\Seeder;

class PatrimonialRequestStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_request_statuses =
        [
            [
                'code'        => 'ABE',
                'description' => 'ABERTO'
            ],
            [
                'code'        => 'FEC',
                'description' => 'FECHADO'
            ],
            [
                'code'        => 'AUT',
                'description' => 'AUTORIZAR'
            ],
            [
                'code'        => 'AUD',
                'description' => 'AUTORIZADO'
            ],
            [
                'code'        => 'CAN',
                'description' => 'CANCELADO'
            ]
        ];
    
        foreach ($patrimonial_request_statuses as $patrimonial_request_status)
        {
            \SisCad\Entities\PatrimonialRequestStatus::create($patrimonial_request_status);
        }
    }
}

