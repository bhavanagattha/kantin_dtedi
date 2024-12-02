<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supplier')->insert([
            ['name' => 'Supplier A', 'username' => 'supplier_a', 'no_telp' => '123456789', 'profile_picture' => 'path', 'status' => 'active', 'income' => 100000],
        ]);
    }
}
