<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function create()
    {
    	return view('user.create', [
    		'title' => 'Регистрация',
    	]);
    }

    public function store(RegisterRequest $request)
    {
    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);

    	Auth::login($user);
    	return redirect()->route('home')->with('status', 'Вы успешно зарегистрированы.');
    }

    public function loginForm()
    {
        return view('user.login', [
            'title' => 'Авторизация',
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            session()->flash('status', 'Вы успешно авторизованы.');
            
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }

        } else {
            return redirect()->back()->withErrors('Вы ввели неверный email и/или пароль.')->withInput();
        }
    }

    public function profile()
    {
        return view('user.profile', [
            'title' => 'Профиль пользователя',
        ]);
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => 'Поле :attribute не заполнено.',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ], $messages);

        $input = $request->except('_token');

        if ($input['password'] == null) {
            $input['password'] = Auth::user()->password;
        } else {
            $input['password'] = Hash::make($request->password);
        }

        $user = User::find(Auth::user()->id);
        $user->update($input);

        return redirect()->route('profile')->with('status', 'Данные сохранены.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
