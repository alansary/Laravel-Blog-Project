@extends('layouts.app')

@section('leftSideOfNavbar')
    <li><a href="/">Home</a></li>
    <li><a href="/services">Services</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/posts">Blog Posts</a></li>
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title"><a href="/posts/find/title/{{$post->id}}">{{$post->title}}</a></h1>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="storage/cover_images/{{$post->cover_image}}" style="width:100%"/>
                </div>
                <div class="col-md-8">
                    <a href="/posts/find/body/{{$post->id}}"><p>{!!$post->body!!}</a></p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <p>Created at <a href="/posts/find/created_at/{{$post->id}}">{{$post->created_at}}</a> by
                <a href="/posts/fine/user/{{$post->id}}">{{$post->user->name}}</a></p>
        </div>
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == {{$post->user_id}})
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-md">Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'post', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-md'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection