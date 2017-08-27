@extends('layouts.app')

@section('leftSideOfNavbar')
    <li><a href="/">Home</a></li>
    <li><a href="/services">Services</a></li>
    <li><a href="/about">About</a></li>
    <li class="active"><a href="/posts">Blog Posts</a></li>
@endsection

@section('content')
    @if(count($posts) > 0)
        <table class="table table-stripped">
            <tr>
                <th>View</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>User</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td><a href="/posts/{{$post->id}}">View</a><td>
                    <td><a href="/posts/find/title/{{$post->id}}">{{$post->title}}</a></td>
                    <td><a href="/posts/find/body/{{$post->id}}">{!!$post->body!!}</a></td>
                    <td><a href="/posts/find/created_at/{{$post->id}}">{{$post->created_at}}</a></td>
                    <td><a href="/posts/find/user/{{$post->id}}">{{$post->user->name}}</a></td>
                </tr>
            @endforeach
        </table>
        {{$posts->links()}}
    @else
        <h1>No Blog Post To Show</h1>
    @endif
@endsection