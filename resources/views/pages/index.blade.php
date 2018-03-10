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

    <p>This is the Laravel application from the "Laravel from Scratch" YouTube series</p>
@endsection