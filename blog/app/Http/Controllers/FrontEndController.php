<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    function index()
    {
        $categories = Category::all();
        //print_r($categories);
        return view('front-end.master', ['categories' => $categories]);
    }

    function getBlogPosts()
    {
        $blogPosts = Post::with('category', 'user')->orderBy('created_at', 'desc')->get();

        return response()->json([
            'blogPosts' => $blogPosts
        ], 200);
    }

    function getPostById($id)
    {
        $post = Post::with('category', 'user')->where('id', $id)->first();

        return response()->json([
            'post' => $post
        ], 200);
    }


    function getCategoryNameFront()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ], 200);
    }

    function getCategoryBlogPostFront($id)
    {
        $posts = Post::with('category', 'user')->where('category_id', $id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'posts' => $posts
        ], 200);
    }

    function search()
    {
        $searchItem = \Request::get('s');

        if ($searchItem!=NULL){
            $blogPosts = Post::with('category', 'user')
                ->where('post_title', 'LIKE', "%$searchItem%")
                ->where('post_description', 'LIKE', "%$searchItem%")
                ->get();

            return response()->json([
                'blogPosts' => $blogPosts
            ], 200);
        }else{
            return $this->getBlogPosts();
        }


    }

}
