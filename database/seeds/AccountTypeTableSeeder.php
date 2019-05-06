<?php

use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_types =
        [
            [
                'code'        => 'P',
                'description' => 'PATRIMONIAL'
            ],
            [
                'code'        => 'R',
                'description' => 'RESULTADO'
            ]
        ];
    
        foreach ($account_types as $account_type)
        {
            \SisCad\Entities\AccountType::create($account_type);
        }
    }
}

