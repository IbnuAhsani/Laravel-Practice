@extends('layouts.app')

@section('content')
	<h1>Posts</h1>
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well">

					{{-- 
						When clicking on the Title, it will redirect
						the page to the given link, which in this case
						is the individual page for the post
					--}}
					<h3><a href="http://localhost/lsapp/public/posts/{{$post->id}}">{{$post->title}}</a></h3>
					
					{{-- Getting the atribute 'created_at' from the variable $post --}}
					<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
			</div>
		@endforeach

		{{-- Link for the pagination --}}
		{{$posts->links()}}
	@else
		<p>No fost found</p>
	@endif 
@endsection