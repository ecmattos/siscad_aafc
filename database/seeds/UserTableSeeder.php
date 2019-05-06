<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
        [
            [
                'name'              => 'ADMIN',
                'fullname'          => 'ADMINISTRADOR',
                'email'             => 'edu.mattos.1970@gmail.com',
                'password'          => '$2a$10$3RQOq.4o8jA/HbK.St98SeTtLvwHmG1Ul5abD7jtQX/HjX3q4P5vu',
                'user_status_id'    => '2',
                'confirmation_code' => '1234567890'
            ],
            [
                'name'              => 'EDUARDO',
                'fullname'          => 'EDUARDO CAMARA DE MATTOS',
                'email'             => 'ecmattos@ig.com.br',
                'password'          => '$2a$10$3RQOq.4o8jA/HbK.St98SeTtLvwHmG1Ul5abD7jtQX/HjX3q4P5vu',
                'user_status_id'    => '1',
                'confirmation_code' => '0123456789'
            ]
        ];
    
        foreach ($users as $user)
        {
            \SisCad\Entities\User::create($user);
        }
    }
}
