<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $product_id = Product::first()->value('id');

        $arr['product_id'] = $product_id;
        $arr['text'] = Str::random(50);

        Description::create($arr);



    }
}
