<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Posts\PostMainCategory;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function category()
    {
        $categories = PostMainCategory::with('postSubCategories')->get();
        return view('admin.category', compact('categories'));
    }
}
