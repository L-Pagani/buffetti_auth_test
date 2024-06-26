<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'cronaca',

            ],
            [
                'name' => 'tecnologia',

            ],
            [
                'name' => 'sport',

            ]
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->fill($category);
            $newCategory->save();
        }
    }
}
