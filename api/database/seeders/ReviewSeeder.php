<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $product_id = Product::first()->value('id');
        $user_id = User::where('user_role_id','=',3)->pluck('id'); // user id array



         $arr = [
            [
        'user_id' => $product_id,
        'product_id' => $product_id,
        'commentary' => Str::random(20) ,
        'rating' => random_int(1,5),
            ],
            [
                'user_id' => $product_id,
                'product_id' => $product_id,
                'commentary' => Str::random(20) ,
                'rating' => random_int(1,5),
            ],
            [
                'user_id' => $product_id,
                'product_id' => $product_id,
                'commentary' => Str::random(20) ,
                'rating' => random_int(1,5),
            ],
            [
                'user_id' => $product_id,
                'product_id' => $product_id,
                'commentary' => Str::random(20) ,
                'rating' => random_int(1,5),
            ],
            [
                'user_id' => $product_id,
                'product_id' => $product_id,
                'commentary' => Str::random(20) ,
                'rating' => random_int(1,5),
            ],
            [
                'user_id' => $product_id,
                'product_id' => $product_id,
                'commentary' => Str::random(20) ,
                'rating' => random_int(1,5),
            ],
        ];
            foreach ($user_id as $key => $id) {
                        $arr[$key]['user_id'] = $id;
            }
            //dd($arr);
            foreach ($arr as $arrr) {
                Review::create($arrr);
            }
    }
}
