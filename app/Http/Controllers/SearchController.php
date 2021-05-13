<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$request->validate([
    		's' => 'required',
    	]);

    	$s = $request->s;
    	$posts = Post::where('title', 'LIKE', "%{$s}%")->orderBy('id', 'desc')->with('category')->paginate(2)->appends(request()->only('s'));

    	return view('posts.search', [
    		'title' => 'Поиск',
    		's' => $s,
    		'posts' => $posts,
    	]);
    }
}
