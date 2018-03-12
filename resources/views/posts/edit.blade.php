@extends('layouts.app')

@section('content')
	<h1>Edit Post</h1>

	{{-- 
		Using Laravel Collective, we're creating a form using the Form Class.
		In order to do this, we must import the Laravel Collective Providers
		and Aliases for Form into the confi/app.php
		Form::open signify that the code it below is a form
		Change the method that's being called  to update()
	--}}
	{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}

		{{-- 
			Creating a Text Box to replace the Title using the Form Class
			The blank text box is no filled with the data that was previously saved
		--}}
  	<div class="form-group">

  			{{-- Creating a Label for the text box --}}
  			{{Form::label('title', 'Title')}}

  			{{-- 
  				$post->title will fil the text box with
  				the previous value that we stored in the DB
  			--}}
  			{{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}

  	</div>

		{{-- 
			Creating a Text Area to replace the Body using the Form Class
			The blank text box is no filled with the data that was previously saved
		--}}
  	<div class="form-group">

  			{{-- Creating a Label for the text box --}}
  			{{Form::label('body', 'Body')}}

  			{{-- 
  				The 'id' is referencing to the id for CKEditor (error) 
  				$post->body will fil the text area with
  				the previous value that we stored in the DB
  			--}}
  			{{Form::textarea('body', $post->body, [ 'id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
  			
  	</div> 

		 {{-- 
				Because by default, Laravel routes doesn't allow
				editing a Row using the 'POST' request, we're going 
				to spoof it by adding a hiddent 'PUT' request
		  --}}
		{{Form::hidden('_method', 'PUT')}}

		{{-- 
			Creating a Submit Button to submit the Form.
			This will automatically redirect the page to URL
			end point '/posts/store'
		 --}}
  	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

  {{-- Form::close() signify the ending of a form --}}
	{!! Form::close() !!}
@endsection