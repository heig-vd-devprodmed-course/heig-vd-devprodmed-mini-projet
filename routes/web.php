<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/test-user', function () {
    $user = new User();

    $user->first_name = 'John';
    $user->last_name = 'Doe';
    $user->username = 'johndoe';
    $user->email = 'johndoe@example.com';

    $user->save();

    return $user;
});

Route::get('/test-post-1', function () {
    // Récupère la première personne dans la table `users`, peu importe son ID
    $user = User::first();

    $post = new Post();
    $post->title = 'Mon premier post';
    $post->content = 'Ceci est le contenu de mon premier post.';

    $user->posts()->save($post);

    return $post;
});

Route::get('/test-post-2', function () {
    // Récupère la personne avec l'ID 1 dans la table `users`
    $user = User::find(1);

    $post = new Post();
    $post->content = 'Ceci est le contenu de mon deuxième post.';

    $post->user()->associate($user);

    $post->save();

    return $post;
});

Route::get('/test-like', function () {
    $user = User::find(1);
    $post = Post::find(2);

    $user->likes()->attach($post->id, ['reaction' => 'love']);

    return $post->likes;
});
