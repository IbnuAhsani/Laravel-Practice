@extends('layouts.app')

@section('content')
	
	{{-- 
		Creating a back button to go 
		back to the previous page
	--}}
	<a href="http://localhost/lsapp/public/posts" class="btn btn-default">Go back</a>

	{{-- Displaying the Posts' title --}}
	<h1>{{$post->title}}</h1>	
	
	{{-- 
		Displaying the Posts's body
		The !! is for parsing HTML text
		to normal text
	--}}
	<div>
		{!!$post->body!!}
	</div>

	<hr>

	{{-- Displaying when the Post was created --}}
	<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

	<hr>

	{{-- A Link to Edit the Post, the end points are based on the routes the we created --}}
	<a href="http://localhost/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

	{{-- Creating a Form --}}
	{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
		
		{{-- Spoofing a 'POST' request to a 'DELETE' request --}}
		{{Form::hidden('_method', 'DELETE')}}

		{{-- A submit button for the 'DELETE' Form --}}
		{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
		
	{{-- Closing tag for the Form --}}
	{!!Form::close()!!}
@endsection