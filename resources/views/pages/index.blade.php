@extends('layouts.app')

@section('leftSideOfNavbar')
    <li class="active"><a href="/">Home</a></li>
    <li><a href="/services">Services</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/posts">Blog Posts</a></li>
@endsection

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        @if(Auth::guest())
            <p>
                <a href="/login" class="btn btn-primary btn-lg">Login</a>
                <a href="/register" class="btn btn-success btn-lg">Register</a>
            </p>
        @endif
    </div>
@endsection