<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shifts')->insert([
            ['start_time' => '08:00:00', 'end_time' => '16:00:00'],
            ['start_time' => '16:00:00', 'end_time' => '00:00:00'],
        ]);
    }
}
