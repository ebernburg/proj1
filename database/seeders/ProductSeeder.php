<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTranslation;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(50)->create()
            ->each(function ($product) {

                $productTranslation = new ProductTranslation();
                $productTranslation['product_id'] = $product->id;
                $productTranslation['title'] = $product->name;
                $productTranslation['description'] = 'text';
                $productTranslation['locale'] = 'en';
                $productTranslation->save();

                $productTranslation2 = new ProductTranslation();
                $productTranslation2['product_id'] = $product->id;
                $productTranslation2['title'] = $product->name;
                $productTranslation2['description'] = 'text';
                $productTranslation2['locale'] = 'de';
                $productTranslation2->save();



               // $product->productTranslation()->save($productTranslation);
            });
    }
}
