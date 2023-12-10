<?php

namespace Database\Seeders;

use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $first_id = Product::first()->value('id');
        //
        $arr = [
            [
              'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 1,
                'value' => 'NVIDIA® GeForce® RTX 4080'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 2,
                'value' => '2205 MHz'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 3,
                'value' => 'none'
            ],

            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 4,
                'value' => 'High End'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 5,
                'value' => '16.0 GB'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 6,
                'value' => 'GDDR6X'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 7,
                'value' => '256bit'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 8,
                'value' => 'PCIe 4.0'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 9,
                'value' => '1'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 10,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 11,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 12,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 13,
                'value' => '3'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 14,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 15,
                'value' => 'Yes'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 16,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 17,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 18,
                'value' => '12'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 19,
                'value' => 'Active Cooling'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 20,
                'value' => 'Quad-Slot'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 21,
                'value' => '348 mm'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 22,
                'value' => 'No'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 23,
                'value' => 'multicoloured (RGB)'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 24,
                'value' => '1x 16pin (12VHPWR)'
            ],
            [
                'product_id' => $first_id,
                'product_category_id' => 1,
                'attribute_id' => 25,
                'value' => '750 W'
            ],

            ];


            foreach ($arr as $rrr) {
                AttributeValue::create($rrr);
        }
    }
}
