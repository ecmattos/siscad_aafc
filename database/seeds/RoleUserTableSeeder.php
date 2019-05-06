<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_users =
        [
            [
                'role_id'        => '1',
                'user_id'        => '1'
            ]
        ];
    
        foreach ($role_users as $role_user)
        {
            \SisCad\Entities\RoleUser::create($role_user);
        }
    }
}

