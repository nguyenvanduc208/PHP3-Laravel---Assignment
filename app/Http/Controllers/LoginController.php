<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function viewLogin(){
        return view('login.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|regex:/^.+@.+$/i',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email không dược để trống',
            'email.regex' => 'Emai không hợp lệ',
            'password.required' => 'Mật khẩu không được để trống'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('brand-list'));
        }else{
            return redirect()->back()->with('msg','Sai emai hoặc mật khẩu');
        }
    }

    public function viewSignup(){
        return view('login.signup');
    }

    public function signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/^.+@.+$/i',
            'password' => 'required'
        ],
        [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không dược để trống',
            'email.regex' => 'Emai không hợp lệ',
            'password.required' => 'Mật khẩu không được để trống'
        ]);

        $model = new User();
        $model->fill($request->all());
        $model->password = Hash::make($request->password);
        $model->save();

        return redirect()->back()->with('msg','Đăng ký thành công');
    }

    public function logout() {
        Auth::logout();
        return redirect()->back();
    }
}
