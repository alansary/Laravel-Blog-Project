@extends('layouts.app')

@section('leftSideOfNavbar')
    <li><a href="/">Home</a></li>
    <li><a href="/services">Services</a></li>
    <li class="active"><a href="/about">About</a></li>
    <li><a href="/posts">Blog Posts</a></li>
@endsection

@section('content')
    <h1>{{$title}}</h1>
@endsection