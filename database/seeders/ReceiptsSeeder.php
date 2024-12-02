<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceiptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('receipts')->insert([
            ['payment_type' => 'cash', 'cashier_id' => 1, 'payment' => 5000, 'returns' => 500],
            ['payment_type' => 'qris', 'cashier_id' => 2, 'payment' => 20000, 'returns' => 0],
        ]);
    }
}
