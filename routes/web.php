<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
	// Setting the default URL to access the
	// View 'welcome.blade.php'
	Route::get('/', function () {
	    return view('welcome');
	});

	// Adding an end-point to the base URL
	// to return the View 'about.blade.php'
	// inside the 'pages' folder
	Route::get('/about', function (){
			return view('pages.about');
	});

	// Adding input variables as end-points
	// which are later statically displayed
	// on the webpage 
	Route::get('/users/{id}/{name}', function ($id, $name){
			return 'This is user '.$name.' with an id of '.$id;
	});
*/

/*
	The base URL now refers to the method 'index'
	in the Controller'PagesController' 
 */
Route::get('/', 'PagesController@index');

/* 
	Adding end-point to the base Controller
	which redirects the page to whatever is 
	contained inside the method 'about' in the
	Controller 'PagesController'
*/
Route::get('/about', 'PagesController@about');

// Same thing as above, but with method 'services'
Route::get('/services', 'PagesController@services');

/*
	Load all the methods from the PostsController and add 
	those as end points touch(filename) baseUrl/posts/...
 */
Route::resource('posts', 'PostsController');

/*
	Loading a single method from the 'DashboardController'Controller
	which is the index() method and setting that endpoint as '.../dashboard'
 */
Route::get('/dashboard', 'DashboardController@index');

/*
	Loading all the routes necessary in 
	order to enable authentification
 */
Auth::routes();
