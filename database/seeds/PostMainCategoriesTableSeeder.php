<?php

use App\Models\Posts\PostMainCategory;
use Illuminate\Database\Seeder;

class PostMainCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostMainCategory::insert([
            [
                'main_category' => '忍術',
            ],
        ]);
    }
}
