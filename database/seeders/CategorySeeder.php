<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Personal']);
        Category::create(['name' => 'Work']);
        Category::create(['name' => 'Other']);
    }
}
