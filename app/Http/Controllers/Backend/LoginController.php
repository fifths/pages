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
        if(is_manage()){
            return redirect('backend/index');
        }
        //echo $password = Hash::make('123456');
        return view('backend.login.login');
    }

    public function login(Request $request)
    {
        $user_email = $request->input('email');
        $user_pass = $request->input('password');
        $check=$this->doLogin($user_email, $user_pass);
        if($check){
            return redirect('backend/index');
        }
        return redirect('backend/login');
    }

    private function doLogin($user_email, $user_pass)
    {
        $user = Users::where('user_email', '=', $user_email)->get();
        if ($user->count() == 1) {
            if (Hash::check($user_pass, $user[0]->user_pass)) {
                $id=$user[0]->id;
                $me=Users::find($id);
                $pass=Hash::make($user_pass);
                $me->user_pass=$pass;
                $me->save();
                $data = array();
                $data['ID']=$me->id;
                $data['user_email']=$me->user_email;
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
