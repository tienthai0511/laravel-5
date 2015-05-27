<?php namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Input;
use Lang;
use App;
use Session;
use Log;
use Illuminate\Support\Facades\Config;

class FrontController extends Controller {
	protected $layout = 'front.layouts.default';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
          //$this->middleware('auth', ['except' => ['index', 'show']]);
    }
	public function index()
	{
		//App::setLocale('vi');
		//print_r(Config::get('app.locale'));
		//echo Lang::get('message.welcome');
		
		//$sestion = Session::get('lang');
		$all_session = $data = Session::all();
		var_dump($all_session);
		Session::regenerate();
		//	toekn
		
		//
		if (Session::has('lang'))
		{
			echo "Lang: " , Session::get('lang');
		}
		//log info
		$user = Auth::user();
		
		//Log::info($user->email . 'login');
		$arg['name'] = 'test params';
		return view('front.front.index', ['arg' => $arg]);
		//$this->layout->content = view('front\front.index', $arg);
		//return view($this->layout, ['content' => '']);
		
	}
public function pregunta(){
      
		$joder = Input::all();
		$data['ok'] = (Auth::guest()) ? 0 : 1;
		

		$data['save'] = 'true';
		return  json_encode($data);
		
    }
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function signUpGet(){
		echo 1;
	}

}
