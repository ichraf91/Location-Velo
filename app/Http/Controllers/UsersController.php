<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    //
    public function show($id){
    return view('users.show')->withUser(User::findOrFail($id));
    }

        public function create(){
        return view('users.register');
    }

       public function register(Request $request){
          $this->validate($request,[
           'email' =>'email',
           'password' => 'required',
           'name' => 'required',
           'tel' => 'numeric',
           'ville' => 'required']);
    User::create([
    'name' =>$request->name,
    'email' =>$request->email,
    'password' =>Hash::make($request->password),
    'tel' =>$request->tel,
    'ville' =>$request->ville
    ]);
  return redirect()->route('users.login')->with([
    'success' => 'Compte crée']);

  }
    public function login(){
    return view('users.login');
}
    public function auth(Request $request){
    $this->validate($request,[
    'email' =>'required',
    'password' => 'required'
    ]);

    if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){

    return redirect()->route('bikes.index');
    }else{
    return redirect()->route('users.login')->with([
    'error'=> 'Email ou mot de passe est incorrect'
    ]);
    }}
    public function logout(){
    auth()->logout();
    return redirect()->route('bikes.index');
    }}

