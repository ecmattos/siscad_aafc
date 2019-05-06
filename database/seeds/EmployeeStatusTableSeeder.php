<?php

use Illuminate\Database\Seeder;

class EmployeeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_statuses =
        [
            [
                'code'        => 'AT',
                'description' => 'ATIVO'
            ],
            [
                'code'        => 'IN',
                'description' => 'INATIVO'
            ]
        ];
    
        foreach ($employee_statuses as $employee_status)
        {
            \SisCad\Entities\EmployeeStatus::create($employee_status);
        }
    }
}

