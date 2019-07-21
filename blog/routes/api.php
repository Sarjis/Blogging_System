<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog/posts', [
    'uses' => 'FrontEndController@getBlogPosts',
    'as' => '/blog/posts'
]);
Route::get('/single-post/{id}', [
    'uses' => 'FrontEndController@getPostById',
    'as' => '/single-post'
]);
Route::get('/category/front', [
    'uses' => 'FrontEndController@getCategoryNameFront',
    'as' => '/category/front'
]);
Route::get('/category-post/{id}', [
    'uses' => 'FrontEndController@getCategoryBlogPostFront',
    'as' => '/category-post/'
]);
Route::get('/search', 'FrontEndController@search')->name('/search');

