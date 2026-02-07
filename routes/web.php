<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-user', function () {
    $user = new User();

    $user->first_name = 'John';
    $user->last_name = 'Doe';
    $user->username = 'johndoe';
    $user->email = 'johndoe@example.com';
    $user->password = 'password';

    $user->save();

    return $user;
});
