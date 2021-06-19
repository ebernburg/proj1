<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sort'=> $this->faker->unique()->numberBetween(1, 350),
            'product_category_id'=> $this->faker->numberBetween(1, 5),
//            'product_category_id'=> 1,
            'supplier_id'=> $this->faker->numberBetween(1, 23),
            'price'=> 1.99,
            'image'=> '/storage/photos/1/haenchen.jpg',
            "name"=> $this->faker->name,
            "status"=> '1',

        ];
    }
}
