<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Product::factory()->count(50)->create();


        Product::create([
            'name' => 'Graphic card ASUS RTX 4080',
            'price' =>  3000,
            'about' => 'Nice card broo',
            'category_id' => 1,
            'product_category_id' => 1,
        ]);
        Product::create([
            'name' => 'AMD FX 6300',
            'price' =>  666,
            'about' => 'HOT CPU BRA',
            'category_id' => 1,
            'product_category_id' => 2,
        ]);

        Product::create([
            'name' => 'SSD Samsung ',
            'price' =>  250,
            'about' => 'This is SSD ',
            'category_id' => 1,
            'product_category_id' => 4,
        ]);
        Product::create([
            'name' => 'Apple MacBook Pro',
            'price' =>  4999,
            'about' => 'Eto ne musor',
            'category_id' => 2,
            'product_category_id' => 6,
        ]);
        Product::create([
            'name' => 'Televizor 4k HDR xD',
            'price' =>  5999,
            'about' => 'Nice card broo',
            'category_id' => 4,
            'product_category_id' => 16,
        ]);
        Product::create([
            'name' => 'MOTHERBOARD ASUS z370',
            'price' =>  500,
            'about' => 'eto Matb',
            'category_id' => 1,
            'product_category_id' => 3,
        ]);
        Product::create([
            'name' => 'MICROVOLNOVKA t2000',
            'price' =>  1999,
            'about' => 'some text',
            'category_id' => 5,
            'product_category_id' => 25,
        ]);

        Product::create([
            'name' => 'ASUS HEADPONES 3000',
            'price' =>  3333,
            'about' => 'some text',
            'category_id' => 4,
            'product_category_id' => 20,
        ]);

        Product::create([
            'name' => 'Apple Iphone 20 PRO',
            'price' =>  999,
            'about' => 'some text',
            'category_id' => 3,
            'product_category_id' => 11,
        ]);


        Product::create([
            'name' => 'Beats Headphones 377',
            'price' =>  3333,
            'about' => 'some text',
            'category_id' => 3,
            'product_category_id' => 14,
        ]);

        Product::create([
            'name' => 'Gaming Gigabyte Notebook z300',
            'price' =>  3444,
            'about' => 'some text',
            'category_id' => 2,
            'product_category_id' => 10,
        ]);

        Product::create([
            'name' => 'Home Telephone Panasonic',
            'price' =>  3443,
            'about' => 'some text',
            'category_id' => 3,
            'product_category_id' => 13,
        ]);



        Product::create([
            'name' => 'Huawei phone power bank',
            'price' =>  3333,
            'about' => 'some text',
            'category_id' => 3,
            'product_category_id' => 15,
        ]);

        Product::create([
            'name' => 'Apple Ipad PRO',
            'price' =>  443,
            'about' => 'some text',
            'category_id' => 2,
            'product_category_id' => 8,
        ]);

        Product::create([
            'name' => 'ASUS HEADPONES 3000',
            'price' =>  3333,
            'about' => 'some text',
            'category_id' => 4,
            'product_category_id' => 20,
        ]);
        Product::create([
            'name' => 'Chainik s003',
            'price' =>  3436,
            'about' => 'some text',
            'category_id' => 5,
            'product_category_id' => 23,
        ]);

        Product::create([
            'name' => 'BORK Barbecue',
            'price' =>  3333,
            'about' => 'some text',
            'category_id' => 5,
            'product_category_id' => 24,
        ]);

        Product::create([
            'name' => 'SmartTv wifi receiver',
            'price' =>  3134,
            'about' => 'some text',
            'category_id' => 4,
            'product_category_id' => 17,
        ]);
        Product::create([
            'name' => 'Apple Smartwatches',
            'price' =>  4312,
            'about' => 'some text',
            'category_id' => 3,
            'product_category_id' => 12,
        ]);

        Product::create([
            'name' => 'Alienware desktop gaming PC',
            'price' =>  3333,
            'about' => 'some text',
            'category_id' => 2,
            'product_category_id' => 7,
        ]);
        Product::create([
            'name' => 'SAMSUNG DDR4 16gb memory',
            'price' =>  3555,
            'about' => 'some text',
            'category_id' => 1,
            'product_category_id' => 5,
        ]);

        Product::create([
            'name' => 'Audio Stereo 7:1',
            'price' =>  3412,
            'about' => 'some text',
            'category_id' => 4,
            'product_category_id' => 18,
        ]);

        Product::create([
            'name' => 'Huawei DVD player',
            'price' =>  2222,
            'about' => 'some text',
            'category_id' => 4,
            'product_category_id' => 19,
        ]);

        Product::create([
            'name' => 'Bork Coffee machine z344',
            'price' =>  344,
            'about' => 'some text',
            'category_id' => 5,
            'product_category_id' => 21,
        ]);

        Product::create([
            'name' => 'Belorusskaya Multivarka z666',
            'price' =>  3535,
            'about' => 'some text',
            'category_id' => 5,
            'product_category_id' => 22,
        ]);
    }
}
