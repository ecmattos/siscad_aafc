<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =
        [
            [
                'name'  => 'admin',
                'display_name'  => 'Administração'
            ] 
        ];
    
        foreach ($roles as $role)
        {
            \SisCad\Entities\Role::create($role);
        }
    }
}

