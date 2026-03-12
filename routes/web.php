<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->with('user')->with('likes')->limit(3)->get();

    return view('home', ['posts' => $posts]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/@{username}', [ProfileController::class, 'show'])->where('username', '[A-Za-z0-9-_]+');

Route::resource('posts', PostController::class);

Route::singleton('my-profile', MyProfileController::class)->destroyable();

Route::match(['put', 'patch'], '/likes/{post}', [LikeController::class, 'update']);
