<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class PostController extends Controller
{
    public function test()
    {
        $post = new Post();
        dd($post->user());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories', 'user')->get();



        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $response = Gate::inspect('create');

        if ($response->denied()) {
            return redirect()->back()->with('status', $response->message());
        }

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $request->title;

        $post->user_id = Auth::id();
        $filename = sprintf('thumbnail_%s.jpg', random_int(1, 1000));
        if ($request->hasFile('thumbnail'))
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        else
            $filename = Null;
        $post->thumbnail = $filename;

        $post->save();

        $post->categories()->attach($request->categories);
        if ($post) {
            return redirect()->route('posts.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //  Gate::authorize('edit-post',$post->user->id);
        $response = Gate::inspect('view', $post);

        if ($response->denied()) {
            return redirect()->back()->with('status', $response->message());
        }
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $post->user_id;
        $response = Gate::inspect('update', $post);

        if ($response->denied()) {
            return redirect()->back()->with('status', $response->message());
        }
        $filename = sprintf('thumbnail_%s.jpg', random_int(1, 1000));
        if ($request->hasFile('thumbnail'))
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        else
            $filename = $post->thumnail;
        $post->thumbnail = $filename;
        $post->update();
        $post->categories()->sync($request->categories);
        if ($post) {
            return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $response = Gate::inspect('delete', $post);

        if ($response->denied()) {
            return redirect()->back()->with('status', $response->message());
        }
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
