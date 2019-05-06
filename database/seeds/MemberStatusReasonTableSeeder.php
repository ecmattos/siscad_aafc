<?php

use Illuminate\Database\Seeder;

class MemberStatusReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member_status_reasons =
        [
            [
                'code'        => 'NI',
                'description' => '(NAO INFORMADO)'
            ],
            [
                'code'        => 'FA',
                'description' => 'FALECIMENTO'
            ],
            [
                'code'        => 'DP',
                'description' => 'DESL A PEDIDO'
            ]
        ];
    
        foreach ($member_status_reasons as $member_status_reason)
        {
            \SisCad\Entities\MemberStatusReason::create($member_status_reason);
        }
    }
}

