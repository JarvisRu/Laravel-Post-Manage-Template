<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Category1',
        ]);

        Category::create([
            'name' => 'Category2',
        ]);

        Category::create([
            'name' => 'Category3',
        ]);

        Category::create([
            'name' => 'Category4',
        ]);
    }
}
