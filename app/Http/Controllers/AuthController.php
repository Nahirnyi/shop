<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function registerForm()
    {
    	return view('pages.register');
    }

    public function register(Request $request)
    {
    	$this->validate($request, [
    		'firstName' => 'required',
            'lastName' => 'required',
            'anotherName' => 'required',
            'phoneNumber' => 'required',
            'city' => 'required',
            'numberDepartment' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required'
    	]);
    	$user = User::add($request->all());
    	$user->generatePassword($request->get('password'));

    	return redirect()->route('loginForm');
    }

    public function loginForm()
    {
    	return view('pages.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	if(Auth::attempt([
    		'email' => $request->get('email'),
    		'password' => $request->get('password')
    	]))
    	{
    		return redirect('/');
    	}

    	return redirect()->route('loginForm')->with('status', 'Неправильний логін або пароль');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('loginForm');
    }
}
