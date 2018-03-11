<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* 
    importing 'Post' model in order to be
    able to use Eloquent syntax on it
*/
use App\Post;

/*
    importing DB library in order to 
    search by raw Query
 */
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all the data from the Post table
        // $posts = Post::all();

        // Using raw Query with the DB library to fetch
        // all the data from 'posts' Table
        // $post = DB::select('SELECT * FROM posts')
        
        // Fetch the data from the Post table
        // where the 'title' is 'Post Two'
        // $posts = Post::where('title', 'Post Two')->get();

        // Fetch ONE data from the Post table and 
        // ordering them by 'title' and 'ascendingly'
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();

        // Create a pagination for all the data from table 'Posts'
        // and limit the page so that every page only has 10 data
        $posts = Post::orderBy('title', 'desc')->paginate(10);

        // Fetch all the data from the Post table
        // and ordering them by 'title' and 'ascendingly'
        // $posts = Post::orderBy('title', 'desc')->get();

        // When the index() method is called, it 
        // will return View 'index' in Folder 'posts'
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Select from 'Post' Table where 
        // 'id' = $id 
        $post = Post::find($id);

        // Retrun the View 'show.blade.php' from the 
        // Folder 'posts' while attaching the $post variable
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
