<html>
<head>
	<title></title>
</head>
<body>
<style>
.alert-danger{
	color:red;
}
</style>
	<div class="">
	<style>
  #imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>

<div id="imagePreview"></div>
<input id="uploadFile" type="file" name="image" class="img" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script>
  $(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
	</div><br>
	EROR:
	 @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
        @endforeach
	<?php print_r($arg); ?>
	{!! Form::open(
    array(
        'route' => 'post.store', 
        'class' => 'form', 
        'novalidate' => 'novalidate', 
        'files' => true)) !!}

<div class="form-group">
    {!! Form::label('Product Name') !!}
    {!! Form::text('name', null, array('placeholder'=>'Chess Board')) !!}
</div>

<div class="form-group">
    {!! Form::label('Product SKU') !!}
    {!! Form::text('sku', null, array('placeholder'=>'1234')) !!}
</div>

<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Product!') !!}
</div>
{!! Form::close() !!}
</div>
</body>
</html>