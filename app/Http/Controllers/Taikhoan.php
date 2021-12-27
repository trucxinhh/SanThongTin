<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Taikhoan extends Controller
{
    public function username() {
        return 'username';
    }
    public function __construct()
    {
      if(Auth::check()){
        $nguoidung = Auth::user();
        view()->share('nguoidung',$nguoidung);
      }
      view()->share('chuoi',"ahihihi");
    }
    public function lienhe(){
       return view('pages.lienhe');
    }
    public function dangky(){
      if(Auth::check()){
        $nguoidung = Auth::user();
        $x = view('taikhoan.dangky',compact('nguoidung'));
      }else{
        $x = view('taikhoan.dangky');
      }
      
      return $x;
    }
    public function postdangky(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:6|unique:users,name',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6|max:32',
            'pw2' => 'required|same:password'
        ],[
            'name.required'=>'Không được để trống tên đăng nhập',
            'name.min'=>'Tên đăng nhập tối thiểu 6 ký tự',
            'name.unique'=>'Tên đăng nhập đã tồn tại',

            'email.required'=>'Không được để trống Email',
            'email.unique'=>'Email đã tồn tại',

            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
            'password.max'=>'Mật khẩu tối đa 32 ký tự',
            'pw2.required'=>'Bạn chưa nhập lại mật khẩu',
            'pw2.same'=>'Mật khẩu nhập lại không khớp'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        User::create([
          'name'=>$name,
          'email'=>$email,
          'password'=>bcrypt($password)
        ]);
        return redirect('dangky')->with('thongbao','Bạn đã đăng ký tài khoản thành công');
    }
    public function getdangnhap(){
       // return view('taikhoan.dangky');
    }
    public function postdangnhap(Request $request){
        $validated = $request->validate([
              'name' => 'required',
              'password' => 'required'
        ],[
              'name.required'=>'Không được để trống tên đăng nhập',
              'password.required'=>'Bạn chưa nhập mật khẩu'
        ]);
        $name = $request->name;
        $password = $request->password;
        /*if (Auth::attempt(['name'=>$name,'password'=>$password])){
            return redirect('/')->with('thongbao','Đăng nhập thành công');
        }else{
            return redirect('dangky')->with('thongbao','Đăng nhập không thành công');
        }*/
        // dd($request->all());
        if (Auth::attempt($request->only('name','password'))){
            $request->session()->regenerate();
            return redirect('');
        }
        return back()->withErrors([
            'name' => 'Tên đăng nhập hoặc mật khẩu không đúng',
        ]);
    }
    public function dangxuat(){
       Auth::logout();
       return redirect('/');
    }
    public function quanlytk(){
       
       return view('taikhoan.quanlytk');
    }

}
