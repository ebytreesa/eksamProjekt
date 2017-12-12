<!doctype html>
<html lang="da">
<head>

<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/bootstrap.min.css') }}">
<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script> 
</head>

<style type="text/css">
	/*.nav {
  display:table;
}
.nav > li{
  border: 1px solid red;
}
.nav-justified {
width: 98%;
}*/
body{
	font-size: 16px;
}

 .nav  li  a {
    line-height: 29px;
    font-size: 18px;
    color:white;
}

.navbar li a:hover{
	display: block;
}
.navbar li a:hover{
	background-color: #006699;
}

nav {
	margin:0;
	padding: 0;
}
.navbar-nav {
    display:table;
    width:100%;
    margin: 0;
}
.navbar-nav > li {
    float:none;
    display:table-cell;
    text-align:center;
}

.dropdown-menu {
	border-radius:0 0px 15px 15px;
	background-color: black;
	opacity: 0.9;
	padding: 0px 5px 10px 5px;
	display: none;
}

.dropdown-menu li a{
	border-bottom: 1px solid grey;
}


</style>
<body style=" background-color:	#DCDCDC;">

<div class="container"  >
<div class="container" style="margin-top:10px;">
			@if ( Session::has('success'))
			<div class="alert alert-success" style="backgroun">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('success') }}
			</div>
			@endif
			@if ( Session::has('error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					{{ Session::get('error') }}
				</div>
			@endif
		</div>
	
	<div class="row header" style="margin-top:30px; margin-bottom:0px;height:70px;">
		<div class="col-sm-9">   
			<a class="navbar-brand" href="/" ><p style="font-size:40px; color:blue; font-family:Comic Sans MS, Comic Sans, cursive !important;font-style:italic;"><strong >Fisk</strong><strong style="color:black;">.nu</strong></p></a>
		</div>
	
		<div class="col-md-3 " >
			{{ Form::open(array('route' =>'postSearch', 'class' => 'navbar-form')) }}				
			
					 <div class="input-group search" >
						<input class="" name="search" id="search" type="text" style="height:34px;">
						 <div class="input-group-btn">
						<button class="btn btn-small btn-primary" type="submit">søg</i></button>
						</div>
					</div>
				
			{{ Form::close()}}
		</div>	
	</div>

	<div class="row">			
		<nav class="navbar navbar-inverse" >
			<div class="container">
	 			<div class="navbar-header">
  					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" >
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
   						<span class="icon-bar"></span>
 					</button>
  					
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav nav-justified">						 
						<li><a href="{{ URL::to('/') }}" class="active">Forsiden</a></li>								
						<li class="dropdown">									
							<a href="" class="dropdown-toggle" data-toggle="dropdown" class="active">Produkter</a>
							<ul class="dropdown-menu">						
										
								<?php
									$cat = Category::get();?>
								@foreach($cat as $cat)
									<li ><a href="{{ URL::to('/category/'.$cat->id) }} ">{{ $cat->name }}</a></li>
								@endforeach

								
							</ul>																	
						</li>
						<li ><a href="{{ URL::to('/offer') }}" class="active">Tilbud</a></li>
							<?php
								$pages = Page::get();
							?>
							@foreach($pages as $page)
								@if($page->visible == 1)
								<li ><a href="{{ URL::to('/page/'.$page->slug) }} ">{{ $page->slug }}</a></li>
								@endif
							@endforeach							
						
						<li ><a href="{{ URL::to('/contact') }}" class="active">Kontakt</a></li>
						@if (Auth::check())
							<li ><a href="{{ URL::to('/logout') }}" class="active">Logout</a></li>
							@if(Auth::user()->admin == 1)						
							
							<li ><a href="{{ URL::to('/admin') }}">Dashboard</a></li>
							@endif
						{{-- @else
							<li ><a href="{{ URL::to('/login') }}">Login</a></li>
						<li ><a href="{{ URL::to('/register') }}">Sign up</a></li> --}}
						@endif
						
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="row" style="background-color:white; padding-top:40px;border-radius:8px;">
		@yield('content')
	
		
	</div>

	<div class="row" >
		@yield('box')
	</div>

	<div class="footer" style="height:50px;">
	<?php
		$address = Address::first();
	?>
		<span class="pull-right" style="margin-top:10px;">{{ $address->name}},{{ $address->street}}, {{ $address->city}}, Tlf:{{ $address->phone}}, {{ $address->email}}</span>
	
		
	</div>
				
		

		
			
	</div>