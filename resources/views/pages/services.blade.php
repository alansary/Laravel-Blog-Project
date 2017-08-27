@extends('layouts.app')

@section('leftSideOfNavbar')
    <li><a href="/">Home</a></li>
    <li class="active"><a href="/services">Services</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/posts">Blog Posts</a></li>
@endsection

@section('content')
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection