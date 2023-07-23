<?php

use App\Models\Posts\PostSubCategory;
use Illuminate\Database\Seeder;

class PostSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostSubCategory::insert([
            [
                'post_main_category_id' => '1',
                'sub_category' => 'デジタル忍術',
            ],
        ]);
    }
}
