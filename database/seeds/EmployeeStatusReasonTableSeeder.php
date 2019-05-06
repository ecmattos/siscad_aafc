<?php

use Illuminate\Database\Seeder;

class EmployeeStatusReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_status_reasons =
        [
            [
                'code'        => 'NI',
                'description' => '(NAO INFORMADO)'
            ]
        ];
    
        foreach ($employee_status_reasons as $employee_status_reason)
        {
            \SisCad\Entities\EmployeeStatusReason::create($employee_status_reason);
        }
    }
}

