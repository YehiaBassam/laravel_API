<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;    // declatarion of model as DB in mysql
use App\Http\Requests\storePostRequest;

class postcontroller extends Controller
{
    public  function index()
    {
        return view ('posts.index',[
            'myposts' => Post::paginate(3)  //Data from DB 
        ]);

    }
    public function create()
    {
        return view ('posts.create');
    }

    //  function store(Request $request)
    // {

    public function store(storePostRequest $request)
{
    // The incoming request is valid...

    // Retrieve the validated input data...
    $request->validated();
        $mysql = new Post();
        $mysql->title = $request->input('title');
        $mysql->description = $request->input('description');
        $mysql->user_id = $request->user()->id;
        $mysql->save() ;
        return redirect()->route('posts.index');

        return view ('posts.store');
}

        
    // }

    public function show($post)
    {
        $postdata = Post::find($post);
    
        return view ('posts.show',['postdata'=>$postdata]);
    }

    public  function edit($post)
    {
        $postdata = Post::find($post); //find 'id' for post 
        return view ('posts/edit',['postdata'=>$postdata]);
    }

    public function update($post,storePostRequest $request)
    {
        $postdata = Post::find($post);
        $postdata->update([
            'title'=>request()->title,
            'description'=>request()->description,
            'creator'=>request()->creator
        ]);
        return redirect (route('posts.index'));
    }

    public function delete($post)
    {
        $postdata = Post::find($post);
        $postdata->delete();
        return redirect (route('posts.index'));

    }
}
