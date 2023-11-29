<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostsRequest;
use App\Models\ActionLogs\ActionLog;
use App\Models\Posts\Post;
use App\Models\Posts\PostComment;
use App\Models\Posts\PostCommentFavorite;
use App\Models\Posts\PostFavorite;
use App\Models\Posts\PostMainCategory;
use App\Models\Posts\PostSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class PostsController extends Controller
{
    public function show(Request $request)
    {
        $posts = Post::with('user', 'postSubCategory')->get();
        $categories = PostMainCategory::with('postSubCategories')->get();
        $postFavorites = new PostFavorite();
        $comments = new PostComment();
        $countView = new ActionLog();

        $request->session()->remove('keyword');

        if (!empty($request->keyword)) {
            $posts = Post::with('user', 'postSubCategory')
                ->where('title', 'like', '%' . $request->keyword . '%')
                ->orwhere('post', 'like', '%' . $request->keyword . '%')
                ->orWhereHas('postSubCategory', function ($q) use ($request) {
                    $q->where('sub_category', $request->keyword);
                })
                ->get();
            $request->session()->put('keyword', $request->keyword);
        } else if ($request->category_word) {
            $posts = Post::with('user', 'postSubCategory')
                ->whereHas('postSubCategory', function ($q) use ($request) {
                    $q->where('sub_category', $request->category_word);
                })
                ->get();
        } else if ($request->favorite_post) {
            $favorites = PostFavorite::where('user_id', Auth::id())->get('post_id');
            $posts = Post::with('user', 'postSubCategory')
                ->whereIn('id', $favorites)->get();
        } else if ($request->auth_post) {
            $posts = Post::with('user', 'postSubCategory')
                ->where('user_id', Auth::id())->get();
        }

        return view('general.top', compact('posts', 'categories', 'postFavorites', 'comments', 'countView'));
    }

    public function createForm()
    {
        $categories = PostMainCategory::with('PostSubCategories')->get();
        return view('general.post', compact('categories'));
    }

    public function createPost(StorePostsRequest $request)
    {
        $user_id = Auth::id();
        $sub_category_id = $request->input('sub_category_id');
        $title = $request->input('title');
        $post = $request->input('post');
        $event_at = now();

        Post::create([
            'user_id' => $user_id,
            'post_sub_category_id' => $sub_category_id,
            'title' => $title,
            'post' => $post,
            'event_at' => $event_at,
        ]);

        return redirect(route('top'));
    }

    public function detail($post_id)
    {
        $user_id = Auth::id();
        $countView = new ActionLog();
        $actionLog = ActionLog::where('post_id', $post_id)
            ->where('user_id', $user_id)->first();
        if (is_null($actionLog)) {
            $countView->firstVisit($post_id, $user_id);
        };

        $post = Post::where('id', $post_id)->with('user', 'postSubCategory')->first();
        $comments = PostComment::where('post_id', $post_id)->with('user')->get();
        $postFavorites = new PostFavorite();
        $commentFavorites = new PostCommentFavorite();
        $categories = PostMainCategory::with('PostSubCategories')->get();

        return view('general.detail', compact('post', 'comments', 'postFavorites', 'commentFavorites', 'countView', 'categories'));
    }

    public function editform($post_id)
    {
        $post = Post::where('id', $post_id)->with('user', 'postSubCategory')->first();
        $categories = PostMainCategory::with('PostSubCategories')->get();
        return view('general.editForm', compact('post', 'categories'));
    }

    public function editPost(StorePostsRequest $request)
    {
        $post_id = $request->input('post_id');
        $sub_category_id = $request->input('sub_category_id');
        $title = $request->input('title');
        $post = $request->input('post');

        Post::where('id', $post_id)->update([
            'post_sub_category_id' => $sub_category_id,
            'title' => $title,
            'post' => $post,
        ]);

        return redirect(route('postDetail', $post_id));
    }

    public function deletePost($post_id)
    {
        Post::findOrFail($post_id)->delete();
        return redirect(route('top'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
