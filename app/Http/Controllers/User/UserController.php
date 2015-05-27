<?php namespace App\Http\Controllers\User;
 
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
//use App\Models\User;
#use App\Models\Users;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Hash;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller {
 
	public function showProfile(){
		$user = Auth::user();
		if(!$user->id){
			Auth::logout();
		}
		return view('user.profile', [
			'user' => 'demo',
			'data' => $user,
		]);
	}
	public function updateProfile(){
		$user = Auth::user();
		if(!$user->id){
			Auth::logout();
		}
		return view('user.profile', [
			'user' => 'demo',
			'data' => $user,
		]);
	}
	public function show($username) {
		return "showing boards for $username";
	}
}