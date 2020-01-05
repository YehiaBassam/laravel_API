<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\postResource;
use App\Http\Requests\storePostRequest;


class postcontroller extends Controller
{
    public function index()
    {
        return postResource::collection(Post::with('user')->paginate(3));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return new postResource ($post);
    }

    public function store(storePostRequest $request)
    {   
        // $request->validated();
        $mysql = new Post();
        $mysql->title = $request->input('title');
        $mysql->description = $request->input('description');
        $mysql->user_id = $request->user()->id;
        $mysql->save() ;

        return postResource::collection(Post::paginate(3));
    }
}
