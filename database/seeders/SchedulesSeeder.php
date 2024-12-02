<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            ['shift_id' => 1, 'cashier_id' => 1, 'day' => 'senin'],
            ['shift_id' => 2, 'cashier_id' => 2, 'day' => 'selasa'],
        ]);
    }
}
