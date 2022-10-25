<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show($id, User $user){
        $userEvents = $user->event();
        dd($userEvents);
        return view('users.show', compact('user','userEvents'))->withUser(User::findOrFail($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            return redirect()->route('events.index');
        }else{
            return redirect()->route('users.login')->with([
                'error'=> 'Email ou mot de passe est incorrect'
            ]);
        }}
    public function logout(){
        Auth::logout();
        return redirect()->route('users.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
