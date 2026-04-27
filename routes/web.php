<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokenController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\EpisodeController;


Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->with('user')->with('likes')->limit(3)->get();

    return view('home', ['posts' => $posts]);
});

Route::get('/about', function () {
    return view('about');
});


// Friends – Saisons
Route::get('/seasons', [SeasonController::class, 'index'])
    ->name('seasons.index');

// Friends – Épisodes d’une saison
Route::get('/seasons/{season}/episodes', [EpisodeController::class, 'index'])
    ->name('episodes.index');

// Friends – Détail d’un épisode
Route::get('/episodes/{episode}', [EpisodeController::class, 'show'])
    ->name('episodes.show');


Route::get('/@{username}', [ProfileController::class, 'show'])->where('username', '[A-Za-z0-9-_]+');

Route::resource('posts', PostController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::singleton('my-profile', MyProfileController::class)->destroyable()->middleware('auth');

Route::match(['put', 'patch'], '/likes/{post}', [LikeController::class, 'update'])->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/register', 'showRegister');
    Route::post('/auth/register', 'register');
    Route::get('/auth/login', 'showLogin')->name('login');
    Route::post('/auth/login', 'login');
    Route::post('/auth/logout', 'logout')->middleware('auth');
});

Route::resource('tokens', TokenController::class)->only(['index', 'create', 'store', 'destroy'])->middleware('auth');
