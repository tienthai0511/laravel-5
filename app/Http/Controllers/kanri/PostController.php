<?php namespace App\Http\Controllers\kanri;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\kanri\PostRequest;

use Illuminate\Http\Request;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arg['name'] = 'test params at kanri page';
		var_dump((\File::exists(base_path() . '/public/images/_imghqdefault.jpg.jpg')));
		return view('kanri\post.index', ['arg' => $arg]);
		//
	}

	public function test()
	{
		echo  'tessssssssssss';
		exit;
		
		//
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
	public function store(PostRequest $request)
	{
		 $extension_name = $request->file('image')->getClientOriginalExtension();
		 $images_name = '_img' . time();//$request->file('image')->getClientOriginalName();
		 print_r(base_path());
		$request->file('image')->move(base_path() . '/public/images/', $images_name . '.'. $extension_name );
	
		echo 1;
		exit; 
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
		

}
