<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cashier')->insert([
            ['name' => 'Cashier 1', 'username' => 'cashier1', 'no_telp' => '123456789', 'password' => bcrypt('password'), 'profile_picture' => 'path', 'status' => 'active', 'salary' => 50000],
        ]);
    }
}
