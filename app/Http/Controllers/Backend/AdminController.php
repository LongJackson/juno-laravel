<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    //
    public function index()
    {
    	return view('backend.admin.index');
    }



    public function list()
    {	
    	$users = User::all();
    	return view('backend.users.list', ['users' => $users]);
    }


    public function edit($id)
    {

    	$user = User::findOrFail($id);

    	return view('backend.users.edit', compact("user"));

    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'Thành viên đã được xóa thành công');
    }
}
