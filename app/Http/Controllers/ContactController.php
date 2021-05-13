<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		$messages = [
    			'required' => 'Поле :attribute не заполнено.',
    		];

    		$request->validate([
    			'name' => 'required',
    			'email' => 'required|email',
    			'phone' => 'required|numeric',
    			'messages' => 'required',
    		], $messages);

    		$body = $request->except('_token');
    		$body['messages'] = nl2br($request->messages);

    		Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($body));
    		return redirect()->route('contacts')->with('status', 'Сообщение отправлено.');
    	}

    	return view('contacts', [
    		'title' => 'Контакты',
    	]);
    }
}
