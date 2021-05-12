<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api', 'scopes:get-email'])->get('/user', function (Request $request) {
    return $request->user()->makeVisible([
        'email'
    ]);
});

Route::middleware(['auth:api', 'scopes:create-posts'])->post('/posts/new', function (Request $request) {
    return $request->user()->posts()->create($request->only(['title', 'content']));
});

Route::get('/posts', function(Request $request) {
    return \App\Models\Post::with('user')->get();
});
