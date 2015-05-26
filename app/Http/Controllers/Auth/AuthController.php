<?php namespace App\Http\Controllers\Auth;
 
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
//use App\Models\User;
use App\Models\Users;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Hash;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller {
 
	protected $redirectPath = '/';
    /**
     * the model instance
     * @var User
     */
    protected $user; 
    /**
     * The Guard implementation.
     *
     * @var Authenticator
     */
    protected $auth;
 
    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user; 
        $this->auth = $auth;
 
        $this->middleware('guest', ['except' => ['getLogout']]); 
    }
 
    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }
 
    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
		
		$user = new Users();
		//$username = Input::get('email');
		$name = $request->input('email');
		print_r($name);
		
		$user->username = '8';
		$user->password = Hash::make('yourpassword');
		//$user->save();
		print_r($user);
		
		//$user->password = Hash::make(Input::get('password'));
		$result = ($user->save());
		echo ($result) ? "ok" : "no";
		exit;
        //code for registering a user goes here.
        $this->auth->login($this->user); 
		
        return redirect('/dash-board'); 
    }
 
    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
		$input = \Request::all();
		print_r($input);
		echo (Auth::guest()) ? 0 : 1;
		
        return view('auth.login');
    }
 
    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
		#login by username or password
		$field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$field => $request->input('email')]);
		$remember = ($request->get('remember') == 'on') ? true : false;
		var_dump($remember);
        if ($this->auth->attempt($request->only($field, 'password'), $remember))
        {
			echo 111;
			echo 222;
			$user = Auth::user();
			echo "</pre>";
			print_r($user->id);
			 return redirect("user/{$user->id}");
			echo "<pre>";
		exit;
			//$email = Auth::user()->email;
			//$role = Auth::user()->role;
			//print_r($email);
			//print_r($role);
            //return redirect('/');
			exit;
        }
 
        return redirect('/login')->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?',
        ]);
    }
 
    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();
 
        return redirect('/login');
    }
  

}