<?php

namespace App\Http\Controllers\Backend;

use App\Users;
use Hash;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index()
    {
        //echo $password = Hash::make('123456');
        return view('backend.login.login');
    }

    public function login(Request $request)
    {
        $user_email = $request->input('email');
        $user_pass = $request->input('password');
        $check=$this->doLogin($user_email, $user_pass);

    }

    private function doLogin($user_email, $user_pass)
    {
        $user = Users::where('user_email', '=', $user_email)->get();
        if ($user->count() == 1) {
            if (Hash::check($user_pass, $user[0]->user_pass)) {
                $data = array();
                $data['ID']=$user[0]->ID;
                $data['user_email']=$user[0]->user_email;
                Session::put('manage', $data);
                return true;
            }
        }
        return false;
    }

    public function logout(){
        Session::flush();
    }
}
