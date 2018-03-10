<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
		// A method 'index' to return the View
		// 'index.blade.php' in the folder 'pages'
    public function index()
    	{
    		// A variable to pass into the View
    		$title = 'Welcome to Laravel';

    		// There are two methods for passing a value to a View.
    		// They are as below. The later one is better for
    		// passing multiple values as an Array
    		
    		// return view('pages.index', compact('title'));
     		return view('pages.index')->with('title', $title);
   	}

		// A method 'about' to return the View
		// 'about.blade.php' in the folder 'pages'
    public function about()
    	{
    		// A variable to pass into the View
    		$title = 'About Us';
    		return view('pages.about')->with('title', $title);
    	}

		// A method 'services' to return the View
		// 'services.blade.php' in the folder 'pages'
    public function services()
    	{
    		// An Array of Data that is passed to
    		// the View 'Services'
    		$data = array(
    			'title' => 'Services',
    			'services' => ['Web Design', 'Programming', 'SEO']
    		);
    		return view('pages.services')->with($data);
    	}
}
