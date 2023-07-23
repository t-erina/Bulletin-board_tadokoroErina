<?php

use App\Models\Posts\PostMainCategory;
use App\Models\Posts\PostSubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostMainCategoriesTableSeeder::class);
        $this->call(PostSubCategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
