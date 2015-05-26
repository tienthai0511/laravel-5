<?php namespace App\Http\Controllers\Account;
 
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
//use App\Models\User;
#use App\Models\Users;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Hash;
use Auth;
use Socialize;
use Illuminate\Http\Request;

class AccountController extends Controller {
 
	// To redirect github
  public function github_redirect() {
    return Socialize::with('github')->redirect();
  }
  // to get authenticate user data
  public function github() {
    $user = Socialize::with('github')->user();
    // Do your stuff with user data.
    print_r($user);die;
  }

}