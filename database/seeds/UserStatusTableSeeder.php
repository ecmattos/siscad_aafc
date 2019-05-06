<?php

use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_statuses =
        [
            [
                'code'        => 'IN',
                'description' => 'INATIVO'
            ],
            [
                'code'        => 'AT',
                'description' => 'ATIVO'
            ]
        ];
    
        foreach ($user_statuses as $user_status)
        {
            \SisCad\Entities\UserStatus::create($user_status);
        }
    }
}

