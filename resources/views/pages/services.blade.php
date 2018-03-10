{{-- 
	@extends means that it is going to be using
	 the Layout 'app' in the Folder 'layouts' 
--}}
@extends('layouts.app')

{{-- 
	@section means that the data inside the @section and
	@endsection is going to be put inside the Layout that's
	being used.
	'content' is the name of the specific @yield in which
	the data is going to be filled
 --}}
@section('content')

    <!-- Displaying a variable that was 
    sent from the Controller 'PagesController' -->
    <h1>{{$title}}</h1>

		{{-- 
			@if is the control statement, the ending of @if
			control statement is annotated by the @endif
			The parameter used is the array of data that is
			being passed from the Controller
		 --}}
    @if(count($services) > 0)
    
    	<ul>

    		{{-- 
					@foreach is a foreach looping, the ending of @foreach
					looping is annotated by the @endforeach
					The parameter used is the array of data that is
					being passed from the Controller
				--}}
				@foreach($services as $service)

					<li>{{$service}}</li>
				@endforeach
    	</ul>
    @endif
@endsection