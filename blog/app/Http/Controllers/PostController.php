<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use Image;
use Auth;

class PostController extends Controller
{
    function validation($request)
    {
        $this->validate($request, [
            'post_title' => 'required|max:255|min:4',
            'post_description' => 'required|max:255|min:4',
            'category_id' => 'required',
            'post_image' => 'required',
        ]);
    }

    function index()
    {
        $posts = Post::with('category', 'user')->get();
        return $posts;
    }

    function getAllPost()
    {
        $posts = Post::with('category', 'user')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    function deletePost($id)
    {
        $posts = Post::find($id);
        //return $posts->post_image;
        if ($posts->post_image) {
            @unlink($posts->post_image);
        }

        $posts->delete();
        //return 'success';
    }

    function editPost($id)
    {
        $post = Post::find($id);
        return response()->json([
            'post' => $post
        ], 200);
    }

    private function imageCustomization($request)
    {
        $url = '';
        $semicolonPosition = strpos($request->post_image, ';');
        $extracted_string_to_semicolon = substr($request->post_image, 0, $semicolonPosition);

        $slesh_separated_string = explode('/', $extracted_string_to_semicolon)[1];

        $image_extension = strtolower($slesh_separated_string);

        if ($image_extension != 'jpg' || $image_extension != 'jpeg' || $image_extension != 'gif') {
            $image_name = time() . '.' . $image_extension;

            $upload_path = 'images/';
            $url = $upload_path . $image_name;

            //Image::make($request->post_image)->resize(200, 200)->save($url);
            Image::make($request->post_image)->save($url);



        }
        return $url;
        //return $image_extension;
    }

    function postStore(Request $request)
    {
        $this->validation($request);
        $url = $this->imageCustomization($request);

        $post = new Post();

        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->comment_id = Auth::user()->id;
        $post->post_title = $request->post_title;
        //return $request->$image_name;
        $post->post_description = $request->post_description;
        $post->post_image = $url;
        //return 'success';
        $post->save();
        return 'Successfully';


    }


    function justUpdatePart($post, $request, $url = null)
    {
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->comment_id = Auth::user()->id;
        $post->post_title = $request->post_title;
        //return $request->$image_name;
        $post->post_description = $request->post_description;

        if ($url) {
            $post->post_image = $url;
        }
        //$post->post_image = $url;
        $post->update();
        return 'success';
    }

    function updatePost(Request $request)
    {
        $this->validation($request);
        $post_image = $request->post_image;
        $post = Post::find($request->id);



        if (strpos($post_image, 'images/') !== false) {
            $this->justUpdatePart($post, $request);
            return 'new photo ashe nai';

        } else {
            @unlink($post->post_image);
            $url = $this->imageCustomization($request);
            $this->justUpdatePart($post, $request, $url);
            return 'photo ashche';
        }


        // $url = $this->imageCustomization($request);
        //return $post->post_image;


        // $this->justUpdateToDatabasePart($post, $request, $url);

    }

//    private function justUpdateToDatabasePart($post, $request, $url=null)
//    {
//
//    }


}


//function postStore(Request $request)
//{
//    $this->validation($request);
//
//
//    $semicolonPosition = strpos($request->post_image, ';');
//    $extracted_string_to_semicolon = substr($request->post_image, 0, $semicolonPosition);
//
//    $slesh_separated_string = explode('/', $extracted_string_to_semicolon)[1];
//
//    $image_extension = strtolower($slesh_separated_string);
//    //$image_extension = ($slesh_separated_string);
//
//    //return $image_extension;
//    if ($image_extension != 'jpg' || $image_extension != 'jpeg' || $image_extension != 'gif') {
//        $image_name = time() . '.' . $image_extension;
//
//        $upload_path = 'images/';
//        $url = $upload_path . $image_name;
//
//        Image::make($request->post_image)->resize(200, 200)->save($url);
//
//
//        $post = new Post();
//
//        $post->category_id = $request->category_id;
//        $post->user_id = Auth::user()->id;
//        $post->comment_id = Auth::user()->id;
//        $post->post_title = $request->post_title;
//        //return $request->$image_name;
//        $post->post_description = $request->post_description;
//        $post->post_image = $url;
//        //return 'success';
//        $post->save();
//        return 'Successfully';
//
//    } else {
//        return 'Not a proper Image File';
//
//    }
//}