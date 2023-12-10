<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            ProductCategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            AttributesSeeder::class,
            AttributesValueSeeder::class,
            ReviewSeeder::class,
            ReviewCommentsSeeder::class,
            DescriptionSeeder::class,

        ]);

        /*
         User::factory(5)->create();

        */

    }
}
