<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stock')->insert([
            ['menu_id' => 1, 'cashier_id' => 1, 'previous_stock' => 100, 'end_stock' => 80],
            ['menu_id' => 2, 'cashier_id' => 2, 'previous_stock' => 50, 'end_stock' => 40],
        ]);
    }
}
