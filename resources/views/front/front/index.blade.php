@extends('front.layouts.default');
@section('content')
	front page template.
	<br>
	Params:
	<h2>translate : {{ trans('message.welcome') }}</h2>
	<a href="/login">login</a>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<div class="g-recaptcha" data-sitekey="6LdpdAcTAAAAAGsFnRRTKRzXJQD5vSEHVS3aks4S"></div>
 <input type="text" name="caja_texto" id="valor1" value="0"/>


Introduce valor 2
<input type="text" name="caja_texto" id="valor2" value="0"/>

Realiza suma
<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val());return false;" value="Calcula"/>
<br/>
<input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
Resultado: <span id="resultado">0</span>
<!--{!! Form::open(array('id' => 'frm'))  !!}
<div class="form-group">
    {!! Form::submit('Contact Us!', 
      array('class'=>'btn btn-primary')) !!}
	 
</div>
{!! Form::close() !!}-->

<form role="form" method="POST" action="{{route('profile')}}"> 
        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
</form>
@stop;