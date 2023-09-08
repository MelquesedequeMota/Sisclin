<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function Login()
    {
      return redirect()->to('/');
    }

    public function username()
    {
        return 'username';
    }

    public function loginUsername()
 {
     return 'username';
 }

    public function Logar(Request $request)
    {
        // dd(Usuarios::where('user_name', $request->user_name)->where('user_senha', $request->user_senha)->first());
        // dd($request->all());
        $credentials = ['username' => $request->user_name, 'password' => $request->user_senha];
        // dd(auth()->attempt($credentials));
        if (auth()->attempt($credentials)) {
            return json_encode(1);
        }else{
            return json_encode(0);
        }
        
    }

    public function Logout()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
    
    public function LoginPass(){
      // dd(Auth::user());
      if(Auth::user()->user_tipo == 3){
        return redirect()->to('home/medico');
      }else{
        return redirect()->to('home/colaborador');
      }
    }

    public function getAuthPassword()
    {
      return $this->user_senha;
    }
}
