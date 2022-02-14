<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    public function list()
    {
        $posts = Post::all();
		return view('post.list', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
		return view('post.edit');
    }

    public function edit($post_id)
    {
        $post = Post::find($post_id);
        if (!Gate::allows('edit-post', $post)) {
            abort(403);
        }

		return view('post.edit', [
            'post' => $post
        ]);
    }

    public function insert(Request $request)
    {
        $content = $request->input('content');
        $record = new Post;
        $record->user_id = auth()->user()->id;
        $record->content = $content;
        $record->save();

        return Redirect::route('list');
    }

    public function delete($post_id)
    {
        $post = Post::find($post_id);
        if (!Gate::allows('delete-post', $post)) {
            abort(403);
        }

        $post->delete();

        return Redirect::route('list');
    }

    public function update(Request $request)
    {
        $post_id = (int)$request->input('post_id');
        $content = $request->input('content');

        $post = Post::find($post_id);
        $request->session()->put('post_id',$post_id);
        $request->session()->put('post',$post);

        if (!Gate::allows('edit-post', $post)) {
            abort(403);
        }

        $post->content = $content;
        $post->save();

        return Redirect::route('list');
    }
}
