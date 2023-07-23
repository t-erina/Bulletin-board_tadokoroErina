<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostSubCategoryiesRequest;
use App\Models\Posts\PostSubCategory;
use Illuminate\Http\Request;

class PostSubCategoriesController extends Controller
{
    public function createSubCategory(PostSubCategoryiesRequest $request)
    {
        $main_category_id = $request->input('main_category_id');
        $sub_category = $request->input('sub_category');

        PostSubCategory::create([
            'post_main_category_id' => $main_category_id,
            'sub_category' => $sub_category,
        ]);
        return back();
    }

    public function deleteSubCategory()
    {
        return back();
    }
}
