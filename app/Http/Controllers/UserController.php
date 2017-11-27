<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function view_userList()
    {
        $users = User::all();
        return view('pages.user-list')->with(compact('users'));
    }

    public function view_userNew()
    {
        return view('pages.user-new');
    }

    public function view_userDetail()
    {

    }

    public function view_userRole()
    {
        
    }


    public function newUser(Request $request)
    {
        $r = User::create($request->all());

        Session::flash('flash_msg_success',['title' => 'สำเร็จ','text' => 'เพิ่มผู้ใช้งานเรียบร้อยแล้ว']);

        return redirect('/user/list');
    }
}
