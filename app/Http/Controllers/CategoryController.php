<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
    	$category = Category::where('slug', $slug)->firstOrFail();
    	
    	$posts = $category->posts()->orderBy('id', 'desc')->paginate(2);

    	return view('categories.show', [
    		'title' => $category->title,
    		'category' => $category,
    		'posts' => $posts,
    	]);
    }
}
