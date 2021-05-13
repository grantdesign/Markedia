<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);

    	return view('posts.index', [
    		'title' => 'Markedia - Marketing Blog',
            'posts' => $posts,
    	]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->update();

        $comments = Comment::where([
            ['post_id', $post->id],
            ['is_check', 1],
        ])->orderBy('id', 'desc')->limit(3)->get();

    	return view('posts.show', [
    		'title' => $post->title,
            'post' => $post,
            'comments' => $comments,
    	]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Поле :attribute не заполнено.',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ], $messages);

        Comment::create($request->all());
        return redirect()->back()->with('status', 'Комментарий отправлен на проверку.');
    }
}
