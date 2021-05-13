<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Tag;
use App\Post;
use App\Category;

class MainController extends Controller
{
    public function index()
    {
    	return view('admin.index', [
    		'title' => 'Панель Администратора',
    		'users' => User::count(),
    		'tags' => Tag::count(),
    		'posts' => Post::count(),
    		'categories' => Category::count(),
    	]);
    }
}
