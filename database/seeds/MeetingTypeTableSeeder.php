<?php

use Illuminate\Database\Seeder;

class MeetingTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meeting_types =
        [
            [
                'code'        => 'PAL',
                'description' => 'PALESTRA'
            ],
            [
                'code'        => 'ENC',
                'description' => 'ENCONTRO'
            ]
        ];
    
        foreach ($meeting_types as $meeting_type)
        {
            \SisCad\Entities\MeetingType::create($meeting_type);
        }
    }
}

