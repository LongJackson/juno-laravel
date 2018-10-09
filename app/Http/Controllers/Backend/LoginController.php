<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Auth;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
    	return view('backend.admin.login');
    }

    public function postLogin(LoginRequest $request)
    {
    	$arr = [
    		'user_email' => $request->email,
    		'password'  => $request->password
    	];
    	$remember = false;
    	if ($request->remember == 'checked') {
    		$remember = true;
    	}

    	if (Auth::attempt($arr, $remember)) {
    		return redirect()->route('admin');
    	}
    	return back()->with(['error' => 'Tài khoản không tồn tại']);

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
