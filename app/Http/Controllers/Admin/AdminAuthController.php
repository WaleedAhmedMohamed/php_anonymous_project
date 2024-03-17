<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function Laravel\Prompts\password;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }
      public function loginPost(Request $request){
        $rememberme = request('rememberme') == 1? true: false;
        if (auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme
        ))
        {
            return redirect('admin');

        }else{
            session()->flash('error',trans('admin.incorrect_information_login'));
            return redirect('admin/login');

        }
    }
    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect('admin/login');
    }


}
