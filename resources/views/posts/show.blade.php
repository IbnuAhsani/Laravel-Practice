@extends('layouts.app')

@section('content')
	
	{{-- 
		Creating a back button to go 
		back to the previous page
	--}}
	<a href="http://localhost/lsapp/public/posts" class="btn btn-default">Go back</a>

	{{-- Displaying the Posts' title --}}
	<h1>{{$post->title}}</h1>	
	
	{{-- Displaying the Posts's body --}}
	<div>
		{{$post->body}}
	</div>

	<hr>

	{{-- Displaying when the Post was created --}}
	<small>Written on {{$post->created_at}}</small>
@endsection