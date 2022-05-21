<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
  public function redirectToFacebook($service){
    return Socialite::driver($service)->redirect();
  }
  public function facebookCallback($service){
    return $user = Socialite::with($service)->user();
    // return $this->login($user);
  }
}
