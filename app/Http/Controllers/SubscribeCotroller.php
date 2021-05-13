<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;

class SubscribeCotroller extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email',
    	]);

    	Subscribe::create($request->all());
    	return redirect()->back()->with('success', 'Вы подписаны на рассылку.');
    }
}
