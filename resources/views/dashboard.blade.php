@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="http://localhost/lsapp/public/posts/create" class="btn btn-primary">Create Post</a>
                    
                    <hr>
                    
                    <h3>Your Blog Posts</h3>
        
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="http://localhost/lsapp/public/posts/{{$post->id}}/">{{$post->title}}</a></td>
                                    <td><a href="http://localhost/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {{-- Creating a Form --}}
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            
                                            {{-- Spoofing a 'POST' request to a 'DELETE' request --}}
                                            {{Form::hidden('_method', 'DELETE')}}

                                            {{-- A submit button for the 'DELETE' Form --}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            
                                        {{-- Closing tag for the Form --}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
