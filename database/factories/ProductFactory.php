<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'category_id' => 1,
            'body' => $this->faker->text(),
            'dimensions' => $this->faker->randomNumber(),
            'image' => 'images/YEK80IHWIaakqAzdABx7DOn0y67g5njAwcQoMsD8.png',
            'price' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
