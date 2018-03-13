<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
     * This construc() method will prevent anyone
     * who hasn't logged-in to view any pages with
     * the endpoint of '.../dashboard/...' without
     * any exception
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the 'user_id' who is 
        // currently logged-in
        $user_id = auth()->user()->id;

        // Get all the data from different tabel the
        //  has something to do with the user of 'user_id'
        $user = User::find($user_id);

        // Pass the data of Posts from the 'Posts' table
        // which was created by the user $user
        // We call the posts() method, and in the 'dasboard' view
        // we use the alias 'posts' to extract data about that Post
        return view('dashboard')->with('posts', $user->posts);
    }
}
