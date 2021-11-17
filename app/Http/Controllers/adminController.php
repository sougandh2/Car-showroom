<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class adminController extends Controller
{
    public function makeAdmin() {
        return view('admincreate');
    }

    public function CreateAdmin(Request $r) {
        $val = $r->validate([
            'name' => 'required',
            'user' => 'required',
            'pass' => 'required',
        ]);
        $admin = new admin;
        $admin->name = $r->name;
        $admin->username = $r->user;
        $admin->password = $r->pass;
        $admin->save();
        return view('welcome');
    }

    public function adminPage() {
        return view('adminlog');
    }

    public function AdminCheck(Request $r) {
        $check = admin::where('username','=',$r->user)->where('password','=',$r->pass)->first();
        if ($check) {
            $r->session()->put('adminNow',$check->id);
            return view('adminSection');
            //return session('adminNow');
        } else {
            return Redirect()->back()->with('success','AUTHORIZATION ERROR!');
        }
    }

    public function adminLogout() {
        session()->pull('adminNow');
        return view('welcome');
    }

    public function empManage() {
        return view('adminEmphome');
    }
}
