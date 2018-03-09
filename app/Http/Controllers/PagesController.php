<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
		// A method 'index' to return the View
		// 'index.blade.php' in the folder 'pages'
    public function index()
    	{
    		return view('pages.index');
    	}

		// A method 'about' to return the View
		// 'about.blade.php' in the folder 'pages'
    public function about()
    	{
    		return view('pages.about');
    	}

		// A method 'services' to return the View
		// 'services.blade.php' in the folder 'pages'
    public function services()
    	{
    		return view('pages.services');
    	}
}
