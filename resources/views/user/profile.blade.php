@extends('front.layouts.default');
 
@section('content')
    <div class="col-md-8 col-md-offset-2 form-content">
        <h3 class="heading">Profile page</h3>
		 {{$user}}
		{{$data}}
    </div>
@stop