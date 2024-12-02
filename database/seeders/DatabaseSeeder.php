<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ShiftsSeeder::class,
            SchedulesSeeder::class,
            ReceiptsSeeder::class,
            OrdersSeeder::class,
            StockSeeder::class,
            MenuSeeder::class,
            SupplierSeeder::class,
            LogSeeder::class,
            AttendancesSeeder::class,
            CashierSeeder::class,
        ]);
    }
}
