<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'product_id' => 2,
            'user_id' => 1,
            'date' => '2024-01-24',
            'quantity' => 1,
            'price' => 1100000,
            'total' => 1100000,
            'notes' => 'tes aja',
        ]);
    }
}
