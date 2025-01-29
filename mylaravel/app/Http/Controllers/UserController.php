<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function index(){
        $users = User::all();
        return view('user.index', ['user'=>$users]);
    }

    function edit($id){
        $users = User::fine($id);
        $data['user'] = $user;
        return view('user.edit', $data);
    }

    function edit_action(Request $req){
        print_r($req->input());
        $muser = User::fine($req->id);
        $muser->name = $req->name;
        $muser->email = $req->email;
        $muser->password = $req->password;
        $muser->save();
        return redirect('/users');
    }

}
