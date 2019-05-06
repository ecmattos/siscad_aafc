<?php

use Illuminate\Database\Seeder;

class AccountingAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounting_accounts =
        [
            [
                'parent_id'                 => '0',
                'code'                      => '0',
                'code_short'                => '0',
                'description'               => '(SEM CONTA CONTABIL)',
                'account_type_id'           => '1',
                'account_balance_type_id'   => '1',
                'account_coverage_type_id'  => '1',
                'balance_start'             => '0'
            ]
        ];
    
        foreach ($accounting_accounts as $accounting_account)
        {
            \SisCad\Entities\AccountingAccount::create($accounting_account);
        }
    }
}

