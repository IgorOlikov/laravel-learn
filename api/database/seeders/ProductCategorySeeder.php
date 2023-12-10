<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_category_arr = [
            'Graphic cards' => 1 ,
            'Processors' => 1,
            'Motherboards' => 1,
            'Hard drivers' => 1,
            'Memory' => 1,
            'Laptops' => 2,
            'Desktop computers' => 2,
            'Tablets' => 2,
            'Gaming PCs' => 2,
            'Gaming notebooks' => 2,
            'Smartphones' => 3,
            'Smartwatches' => 3,
            'Telephones' => 3,
            'Phone headsets' => 3,
            'Power banks' => 3,
            'TV/VIDEO' => 4,
            'TV Receiver' => 4,
            'HiFi' => 4,
            'Player DVD, Audio & TV' => 4,
            'Speakers & Headphones' => 4,
            'Coffee machines' => 5,
            'Food processors' => 5,
            'Kettles' => 5,
            'Barbecues' => 5,
            'Microwaves' => 5,
        ];

        foreach ($product_category_arr as $name => $category_id){
            ProductCategory::create([
                'name' => $name, 'category_id' => $category_id,]);
        }
    }
}
