<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }}</title>

{{ HTML::style('admin/css/bootstrap.min.css') }}
{{ HTML::style('admin/css/datepicker3.css') }}
{{ HTML::style('admin/css/bootstrap-table.css') }}
{{ HTML::style('admin/css/styles.css') }}
{{ HTML::style('admin/css/custom.css') }}

<!--leaflet-->
{{ HTML::style('http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css') }}
{{ HTML::style('admin/css/leaflet.draw.css') }}



{{ HTML::script('https://code.jquery.com/jquery-2.2.4.min.js') }}


{{ HTML::script('admin/js/jquery.validate.js') }}



<!--Icons-->
{{ HTML::script('admin/js/lumino.glyphs.js') }}

<!--leaflet-->
{{ 	HTML::script('http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js') }}
{{	HTML::script('http://matchingnotes.com/javascripts/leaflet-google.js') }}
{{	HTML::script('admin/js/custom/Google.js') }}
{{ HTML::script('admin/js/custom/leaflet.draw.js') }}

<!--Google map APIs -->
{{ HTML::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyCFEQBvTi6zuAx2lh4Lte_bofdG8eMknlI&sensor=false&libraries=places,drawing,geometry') }}

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
	var url = {
		ward: '/public/admin/info/ward',
		district: '/public/admin/info/district',
		street: '/public/streets',
		priceStreet: '/public/admin/info/price',
		plan: '/public/admin/info/plan',
	};
	
	jQuery(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	});
</script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>CenGroup</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Sentry::getUser()->email }} <span class="caret"></span></a>
						
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="{{ URL::to('/admin/logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			@if($menu)
				@foreach($menu as $m)
					@if($m['show'] == true)
						<li {{ $m['active'] == true ? "class='active'" : "" }} ><a href="{{ URL::to($m['url']) }}"><span class="glyphicon glyphicon-{{ $m['icon'] }}"></span> {{ $m['title'] }}</a></li>
					@endif
				@endforeach
			@endif
			
			<!-- <li><a href="{{ URL::to('admin/streets') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Danh sách Đoạn đường</a></li>
			<li><a href="{{ URL::to('admin/markers') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Danh sách Địa chỉ</a></li>
			<li><a href="{{ URL::to('admin/questions') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Danh sách Câu hỏi</a></li> -->
			
			<!--<li><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>-->
			<!--<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>-->
			<!--<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>-->
			<!--<li class="active"><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>-->
			<!--<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>-->
			<!--<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>-->
			<!--<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>-->
			<!--<li class="parent ">-->
			<!--	<a href="#">-->
			<!--		<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown -->
			<!--	</a>-->
			<!--	<ul class="children collapse" id="sub-item-1">-->
			<!--		<li>-->
			<!--			<a class="" href="#">-->
			<!--				<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1-->
			<!--			</a>-->
			<!--		</li>-->
			<!--		<li>-->
			<!--			<a class="" href="#">-->
			<!--				<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2-->
			<!--			</a>-->
			<!--		</li>-->
			<!--		<li>-->
			<!--			<a class="" href="#">-->
			<!--				<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3-->
			<!--			</a>-->
			<!--		</li>-->
			<!--	</ul>-->
			<!--</li>-->
			<!--<li role="presentation" class="divider"></li>-->
			<!--<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>-->
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">{{ $title }}</h1>
			</div>
		</div><!--/.row-->
		
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
	    
	    <!--.errors-->
	    @if( $errors->has() )
	    <div class="row">
	        <div class="col-md-12">
                @foreach( $errors->all() as $error )
                <div class="alert bg-danger" role="alert">
        			<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> 
        			{{ $error }} 
        			<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        		</div>
        		@endforeach
			</div>
	    </div>
	    @endif
		<!--/.errors-->
		
		
		@yield('content')
		
		
	</div><!--/.main-->
	
	
	{{ HTML::script('admin/js/bootstrap.min.js') }}
	{{ HTML::script('admin/js/bootstrap-datepicker.js') }}
	{{ HTML::script('admin/js/bootbox.min.js') }}
	{{ HTML::script('admin/js/admin.js') }}
	
</body>

</html>
