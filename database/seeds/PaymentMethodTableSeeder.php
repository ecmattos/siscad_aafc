<?php

use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_methods =
        [
            [
                'code'        => 'DEF',
                'description' => 'DESC.FOLHA'
            ],
            [
                'code'        => 'BOL',
                'description' => 'BOLETO'
            ]
        ];
    
        foreach ($payment_methods as $payment_method)
        {
            \SisCad\Entities\PaymentMethod::create($payment_method);
        }
    }
}

