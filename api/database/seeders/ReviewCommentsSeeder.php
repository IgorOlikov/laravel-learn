<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\ReviewComments;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $review_id = Review::all()->pluck('id');
        $user_id = User::where('user_role_id', '=', 3)->pluck('id');

        $arr = [
            [
                'comment' => Str::random(15),
                'review_id' => '',
                'user_id' => '',
            ],
        ];

        $i = 0; $r = 0; $c = 0;
        foreach ($review_id as $item => $value) {
            foreach ($user_id as $k => $v) {
                $arr[$i++]['user_id'] = $v;
                $arr[$r++]['review_id'] = $value;
                $arr[$c++]['comment'] = Str::random(15);
            }
        }
        foreach ($arr as $arrr) {
            ReviewComments::create($arrr);
        }
    }
}
