<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu')->insert([
            ['name' => 'Burger', 'price' => 1000, 'stock' => 50, 'supplier_id' => 1, 'food_type' => 'food', 'menu_picture' => 'path'],
            ['name' => 'Coke', 'price' => 500, 'stock' => 100, 'supplier_id' => 1, 'food_type' => 'drink', 'menu_picture' => 'path'],
        ]);
    }
}
