<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(1);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handling Image Storage
        if ($request->hasFile('cover_image')) {
            $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
            $filenameWithoutExtension = phpinfo($filenameWithExtension, PHPINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filenameWithoutExtension.'_'.time().'.'.$extension;
            // Storing The Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();
        return redirect('/dashboard')->with('success', 'The post has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = Post::find($id);
            if (count($post)) {
                return view('posts.show')->with('post', $post);
            } else {
                return redirect('/')->with('error', 'Invalid URL');
            }
        }
        catch (\Exception $e) {
            return redirect('/')->with('error', 'Invalid URL');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->id == Post::find($id)->user_id)
            return view('posts.edit')->with('post', Post::find($id));
        else
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('cover_image')) {
            $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
            $filenameWithoutExtension = phpinfo($filenameWithExtension, PHPINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filenameWithoutExtension.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image'))
            $post->cover_image = $filenameToStore;
        $post->save();
        return redirect('/dashboard')->with('success', 'The post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == Post::find($id)->user_id) {
            $post = Post::find($id);
            if ($post->cover_image != 'noimage.jpg')
                Storage::delete('public/cover_images'.$post->cover_image);
            $post->delete();
            return redirect('/dashboard')->with('success', 'The post has been deleted successfully');
        } else {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
    }
}
