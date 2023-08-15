<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'auth\login\LoginController@login')->name('login');
    Route::post('/loginForm', 'auth\login\LoginController@loginForm')->name('loginForm');
    Route::get('/register', 'auth\register\RegisterController@register')->name('register');
    Route::get('/storeUser', 'auth\register\RegisterController@storeUser')->name('storeUser');
    Route::get('/added', 'auth\register\RegisterAddedController@added')->name('added');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/top/{keyword?}', 'User\Post\PostsController@show')->name('top');
    Route::get('/logout', 'User\Post\PostsController@logout')->name('logout');

    Route::prefix('/post')->group(function () {
        Route::get('/create-form', 'User\Post\PostsController@createForm')->name('createPostForm');
        Route::post('/create', 'User\Post\PostsController@createPost')->name('createPost');
        Route::get('/detail/{post_id}', 'User\Post\PostsController@detail')->name('postDetail');
        Route::get('/edit-form/{post_id}', 'User\Post\PostsController@editForm')->name('editPostForm');
        Route::post('/edit', 'User\Post\PostsController@editPost')->name('editPost');
        Route::get('/delete/{post_id}', 'User\Post\PostsController@deletePost')->name('deletePost');
        Route::post('/favorite/{post_id}', 'User\Post\PostFavoritesController@favorite')->name('postFavorite');
        Route::post('/unFavorite/{post_id}', 'User\Post\PostFavoritesController@unFavorite')->name('postUnfavorite');
    });

    Route::prefix('/comment')->group(function () {
        Route::post('/create', 'User\Post\PostCommentsController@createComment')->name('createComment');
        Route::get('/edit-form/{comment_id}', 'User\Post\PostCommentsController@editForm')->name('editCommentForm');
        Route::post('/edit', 'User\Post\PostCommentsController@editComment')->name('editComment');
        Route::post('/favorite/{post_id}', 'User\Post\PostCommentFavoritesController@favorite')->name('commentFavorite');
        Route::post('/unFavorite/{post_id}', 'User\Post\PostCommentFavoritesController@unFavorite')->name('commentUnfavorite');
    });

    Route::prefix('/category')->group(function () {
        Route::get('/', 'admin\post\PostsController@category')->name('category');
        Route::post('/main-create', 'admin\post\PostMainCategoriesController@createMainCategory')->name('createMainCategory');
        Route::get('/main-delete/{id}', 'admin\post\PostMainCategoriesController@deleteMainCategory')->name('deleteMainCategory');
        Route::post('/sub-create', 'admin\post\PostSubCategoriesController@createSubCategory')->name('createSubCategory');
        Route::get('/sub-delete/{id}', 'admin\post\PostSubCategoriesController@deleteSubCategory')->name('deleteSubCategory');
    });
});
