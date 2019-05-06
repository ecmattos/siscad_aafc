<?php

use Illuminate\Database\Seeder;

class AccountBalanceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_balance_types =
        [
            [
                'code'        => 'C',
                'description' => 'CREDOR'
            ],
            [
                'code'        => 'D',
                'description' => 'DEVEDOR'
            ]
        ];
    
        foreach ($account_balance_types as $account_balance_type)
        {
            \SisCad\Entities\AccountBalanceType::create($account_balance_type);
        }
    }
}

