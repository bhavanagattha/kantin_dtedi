<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            ['receipts_id' => 1, 'menu_id' => 1, 'amount' => 2, 'price' => 1000],
            ['receipts_id' => 2, 'menu_id' => 2, 'amount' => 3, 'price' => 5000],
        ]);
    }
}
