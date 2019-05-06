<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = 1;

        while($x <= 161) 
        {
            $permission_roles =
            [
                [
                    'role_id'           => '1',
                    'permission_id'     => $x
                ]
            ];
            
            foreach ($permission_roles as $permission_role)
            {
                \SisCad\Entities\PermissionRole::create($permission_role);
            }

            $x++;
        }
    }
}

