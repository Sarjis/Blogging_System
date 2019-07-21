<?php


Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => '/'
]);
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login#/', 'HomeController@index')->name('/register#/');


//Route::get("/{path}", "HomeController@index")->where('path', '.*');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', [
        'uses' => 'PostController@index',
        'as' => 'posts'
    ]);
    Route::post('/category/add', [
        'uses' => 'CategoryController@index',
        'as' => '/category/add'
    ]);
    Route::get('/category', [
        'uses' => 'CategoryController@getAllCategory',
        'as' => '/category'
    ]);
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoryController@deleteCategory',
        'as' => '/category/delete/'
    ]);
    Route::get('/category/fetch/{id}', [
        'uses' => 'CategoryController@fetchCategory',
        'as' => '/category/fetch/'
    ]);
    Route::post('/category/update', [
        'uses' => 'CategoryController@updateCategory',
        'as' => '/category/update/'
    ]);

//post
    Route::get('/post/all', [
        'uses' => 'PostController@getAllPost',
        'as' => '/post/all'
    ]);
    Route::get('/post/delete/{id}', [
        'uses' => 'PostController@deletePost',
        'as' => '/post/delete'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostController@postStore',
        'as' => '/post/store'
    ]);
    Route::get('/post/edit/{id}', [
        'uses' => 'PostController@editPost',
        'as' => '/post/edit/'
    ]);
    Route::post('/post/update', [
        'uses' => 'PostController@updatePost',
        'as' => '/post/update'
    ]);
});

