<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryProduct>
 */
use Faker\Generator as Faker;
use App\Models\CategoryProduct;

class CategoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryIds = Category::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'product_id' => $this->faker->randomElement($productIds),
        ];
    }
}

