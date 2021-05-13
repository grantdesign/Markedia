<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		User::where('id', $request->id)->update(['is_admin' => $request->is_admin]);
    		return redirect()->route('users.index')->with('status', 'Данные обновлены.');

    	}

    	if ($request->isMethod('delete')) {

    		User::destroy($request->id);
    		return redirect()->route('users.index')->with('status', 'Пользователь удален.');

    	}

    	$users = User::orderBy('id', 'desc')->paginate(5);

    	$roles = [
    		['value' => '0', 'title' => 'Пользователь'],
    		['value' => '1', 'title' => 'Администратор'],
    	];

    	return view('admin.users.index', [
    		'title' => 'Список пользователей',
    		'users' => $users,
    		'roles' => $roles,
    	]);
    }
}
