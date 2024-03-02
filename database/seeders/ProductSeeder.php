<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_code' => 'P0001',
            'product_name' => 'Product 1',
            'category_id' => 1,
            'stock' => 10000,
            'purchase_price' => 10000,
            'selling_price' => 20000,
            'description' => 'Product 1 description',
            'photo' => 'product-1.png',
        ]);
    }
}
