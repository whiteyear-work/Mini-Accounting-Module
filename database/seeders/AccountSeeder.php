<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::insert([
            [
                'code' => 1000,
                'name' => 'Cash',
                'type' => 'asset',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '2000',
                'name' => 'Bank',
                'type' => 'asset',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '3000',
                'name' => 'Sales Revenue',
                'type' => 'revenue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '4000',
                'name' => 'Salary Expense',
                'type' => 'expense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => '5000',
                'name' => 'Office Expense',
                'type' => 'expense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
