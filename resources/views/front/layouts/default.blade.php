<!DOCTYPE html>
<html lang="en">
<head>
{!! HTML::script('js/jquery-1.11.0.min.js') !!}
{!! HTML::script('js/main.js') !!}
   
</head>
<body>

	<div class="header">
		  @include('front.include.head')
	</div>
	<div class="wrapper">

	<div class="container">
	@yield('content')
	</div> <!-- /container -->
	widget
	{!! Widget::run('recentNews') !!}
	{!! Widget::recentNews() !!}
	@widget('recentNews');
	 @include('front.include.foot')
	</body>
	</html>
