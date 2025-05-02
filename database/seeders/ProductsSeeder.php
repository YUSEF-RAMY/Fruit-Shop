<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'كاميرا كانون', 'quantity' => '10', 'imagepath' => 'assets/img/products/cam1.jpeg', 'price' => 10, 'category_id' => 1],
            ['name' => 'فراوله', 'quantity' => '4', 'imagepath' => 'assets/img/products/product-img-1.jpg', 'price' => 30, 'category_id' => 4],
            ['name' => 'عنب احمر', 'quantity' => '34', 'imagepath' => 'assets/img/products/product-img-2.jpg', 'price' => 30, 'category_id' => 4],
            ['name' => 'كيوي', 'quantity' => '22', 'imagepath' => 'assets/img/products/product-img-4.jpg', 'price' => 10, 'category_id' => 4],
            ['name' => 'تفاح اخضر', 'quantity' => '12', 'imagepath' => 'assets/img/products/product-img-5.jpg', 'price' => 20, 'category_id' => 4],
            ['name' => 'توت احمر', 'quantity' => '34', 'imagepath' => 'assets/img/products/product-img-6.jpg', 'price' => 20, 'category_id' => 4],
        ]);
    }
}
