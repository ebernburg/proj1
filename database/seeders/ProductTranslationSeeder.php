<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductTranslation::factory()->count(1)->create();
    }
}
