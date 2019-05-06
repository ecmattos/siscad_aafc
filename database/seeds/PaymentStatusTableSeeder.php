<?php

use Illuminate\Database\Seeder;

class PaymentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_statuses =
        [
            [
                'code'        => 'ABE',
                'description' => 'ABERTO'
            ],
            [
                'code'        => 'FEC',
                'description' => 'FECHADO'
            ]
        ];
    
        foreach ($payment_statuses as $payment_status)
        {
            \SisCad\Entities\PaymentStatus::create($payment_status);
        }
    }
}

