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
        $category_arr = [
            'Hardware & Components',
            'Laptops, Tablets & PCs',
            'Smartphones',
            'TV / Video',
            'Home Appliance',
        ];

        foreach ($category_arr as $name){
            Category::create(['name' => $name,]);
        }

    }
}
