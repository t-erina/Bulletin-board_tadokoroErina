<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostMainCategoryiesRequest;
use App\Http\Requests\PostSubCategoryiesRequest;
use App\Models\Posts\PostMainCategory;
use App\Models\Posts\PostSubCategory;
use Illuminate\Http\Request;

class PostMainCategoriesController extends Controller
{
    public function createMainCategory(PostMainCategoryiesRequest $request)
    {
        $main_category = $request->input('main_category');

        PostMainCategory::create([
            'main_category' => $main_category,
        ]);

        return back();
    }

    public function deleteMainCategory($id)
    {
        PostMainCategory::where('id', $id)->delete();
        return back();
    }
}
