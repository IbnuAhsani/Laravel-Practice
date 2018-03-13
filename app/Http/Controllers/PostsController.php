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
     * Create a new controller instance.
     *
     * @return void
     *
     * This construc() method will prevent anyone
     * who hasn't logged-in to view any pages with
     * the endpoint of '.../post/...', with the exception
     * of pages '.../post/index' and '.../post/show'
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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
        // Redirect the web page to the 'Create' page
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
        // This will validate the data that
        // was inputed from the $request
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create a Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        // Get the 'id' of the person who logged in
        $post->user_id = auth()->user()->id;
        
        $post->save();

        // Redirecting and Posting a 'success' message 
        // (using the 'message.blade.php' in the 'inc' Folder)
        // after the Post has been stored
        return redirect('http://localhost/lsapp/public/posts')->with('success', 'Post Created');
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
        // get the Post data that we want to edit
        $post = Post::find($id);

        // Check for the User who's currently logged-in
        // if his/her's id is the same as the id of the
        // User who created the Post
        if(auth()->user()->id !== $post->user_id)
            {
                return redirect('http://localhost/lsapp/public/posts/')->with('error', 'Unauthorized page');
            }

        // Redirect to the edit page where the data
        // will fill the otherwise blank text boxes
        return view('posts.edit')->with('post', $post);
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
        // This will validate the data that
        // was inputed from the $request
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Replacing the value of the data
        // of the Post that match with the $id
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Redirecting and Posting a 'Post Updated' message 
        // (using the 'message.blade.php' in the 'inc' Folder)
        // after the Post has been stored
        return redirect('http://localhost/lsapp/public/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fetching the Post that matches with the $id
        $post = Post::find($id);

        // Check for the User who's currently logged-in
        // if his/her's id is the same as the id of the
        // User who created the Post
        if(auth()->user()->id !== $post->user_id)
            {
                return redirect('http://localhost/lsapp/public/posts/')->with('error', 'Unauthorized page');
            }

        // Delete the Post that was fetched
        $post->delete();

        // Redirect the web page once it's been deleted
        return redirect('http://localhost/lsapp/public/posts')->with('success', 'Post Removed');
    }
}
