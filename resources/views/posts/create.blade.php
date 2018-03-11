@extends('layouts.app')

@section('content')
	<h1>Create Post</h1>

	<!-- 
		Using Laravel Collective, we're creating a form using the Form Class.
		In order to do this, we must import the Laravel Collective Providers
		and Aliases for Form into the confi/app.php
	-->
	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}

		{{-- Creating a Text Box to input the Title using the Form Class --}}
  	<div class="form-group">
  			{{Form::label('title', 'Title')}}
  			{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
  	</div>

		{{-- Creating a Text Area to input the Body using the Form Class --}}
  	<div class="form-group">
  			{{Form::label('body', 'Body')}}
  			{{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
  	</div>  	

		{{-- 
			Creating a Submit Button to submit the Form.
			This will automatically redirect the page to URL
			end point '/posts/store'
		 --}}
  	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection