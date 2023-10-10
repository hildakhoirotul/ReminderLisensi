<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // ...
        // validation can be done here before saving 
        // with $this->validate($request, $rules)
        // ...

        // get data to be saved in an associative array using $request->only()
        $data = $request->only(['title', 'description']);

        //  save post and assign return value of created post to $post array
        $post = Post::create($data);
        event(new PostPublished($post));

        // return post as response, Laravel automatically serializes this to JSON
        return response($post, 201);
    }
}