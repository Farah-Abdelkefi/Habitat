<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        Category::factory(4)->create();

        \App\Models\Product::factory(9)->create([
            'category_id'=>1
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
         ]);
    }
}
