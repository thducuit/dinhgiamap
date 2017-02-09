<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

{{ HTML::style('admin/css/bootstrap.min.css') }}
{{ HTML::style('admin/css/styles.css') }}
{{ HTML::script('admin/js/jquery-1.11.1.min.css') }}
{{ HTML::script('admin/js/bootstrap.min.css') }}

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					
					<!--.alert-->
					@if( Session::get('message') )
					<div class="row">
					    <div class="col-md-12">
					        <div class="alert bg-{{ Session::get('type_message') }}" role="alert">
			    				<svg class="glyph stroked {{ Session::get('icon') }}"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-{{ Session::get('icon') }}"></use></svg> 
			    				{{ Session::get('message') }} 
			    				<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
			    			</div>
					    </div>
					</div>
				    @endif
				    <!--/.alert-->
					
					<!--Error-->
					@if( $errors->has() ) 
						@foreach ( $errors->all() as $error )
							<div class="alert bg-danger" role="alert">
			        			<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> 
			        			{{ $error }} 
			        			<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
			        		</div>
						@endforeach
					@endif
					<!--Error-->
					
					{{ Form::open( array('url'=>'admin/login') ) }}
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{ Input::old('email') }}">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="{{ Input::old('password') }}">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type='submit' class="btn btn-primary">Login</button>
						</fieldset>
					{{ Form::close(); }}
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
    <script>
    function passWord() {
      var testV = 1;
      var pass1 = prompt('Vui lòng nhập mật khẩu', ' ');
      while (testV < 3) {
        if (!pass1){
          history.go(-1);
        }
        if (pass1.toLowerCase() == "dinhgiamap") {                    
          localStorage.setItem("logged", "true");
          window.location.href = "{{action('AdminController@getLogin')}}";
          break;
        }else{
          localStorage.removeItem("logged");
        }
        testV += 1;
        var pass1 =
                prompt('Sai mật khẩu. Xin vui lòng nhập lại', 'Password');
      }
      if (testV == 3) {
        window.location.href = "https://www.google.com";
      }
      return " ";
    }
    if(!localStorage.getItem("logged")){
      passWord();
    }
  </script>
</body>
</html>
