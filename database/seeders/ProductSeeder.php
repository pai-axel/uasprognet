<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_title' => 'Growing Fruits and Vegetables',
            'product_image' =>  'product.jpg',
            'product_content' =>  '"alteration in some form, by injected humour, or adagg',
            'slug' => Str::slug('Growing Fruits and Vegetables')
        ]);
    }
}
