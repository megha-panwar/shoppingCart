<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(2),
            'quantity' => $this->faker->numberBetween(10, 100), // random stock 10 se 100 ke beech

            'price' => $this->faker->randomFloat(2, 50, 999.99),
            'image_url' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
