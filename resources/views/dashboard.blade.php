@extends('layouts.app')

@section('leftSideOfNavbar')
    <li><a href="/">Home</a></li>
    <li><a href="/services">Services</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/posts">Blog Posts</a><li>
@endsection

@section('content')
    @if(count($posts) > 0)
        <table class="table table-stripped">
            <tr>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-md">Edit</a></td>
                    <td>
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-md'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
        </table>
        {{$posts->links()}}
    @else
        <h1>No Blog Posts To Show</h1>
    @endif
@endsection
