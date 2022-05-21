<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    public function create(){
      return view('Login.admin');
    }

    public function store(LoginUser $request ){
      Login::create([
        'name'     => $request -> name,
        'email'    => $request -> email,
        'phone'    => $request -> phone,
        'password' => Hash::make($request['password']),
      ]);

      return redirect()->back() -> with(['success' => 'تم بنجاح']);
    }

    public function edit($id){
      $login = Login::find($id);

      if (!$login)
          return redirect() -> back();

      $login = Login::select(
          'name',
          'email',
          'phone',
          'password'
      )->find($id);
      return view('login.edit', compact('login'));
    }

    public function update(LoginUser $request ,$id){

      $login = Login::find($id);

      $login->update([
        'name'     => $request -> name,
        'email'    => $request -> email,
        'phone'    => $request -> phone,
        'password' => Hash::make($request['password']),
      ]);
        return redirect()->back() -> with(['success' => 'تم بنجاح']);
    }


}
