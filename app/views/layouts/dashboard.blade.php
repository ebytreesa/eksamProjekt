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
}

 .nav  li  a {
    line-height: 25px;
}
.navbar li a:hover{
	background-color: blue;
}*/
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
	opacity: 0.8;
	padding: 0px 5px 10px 5px;
}

.dropdown-menu li a{
	border-bottom: 1px solid grey;
}


</style>
<body style=" background-color:">

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

<div class="container"  >
	
	<div class="row header" style="margin-top:30px; margin-bottom:0px;height:70px;">
		<div class="col-sm-9">   
			<a class="navbar-brand" href="/" ><p style="font-size:40px; color:blue; font-family:Comic Sans MS, Comic Sans, cursive !important;font-style:italic;"><strong >Fisk</strong><strong style="color:black;">.nu</strong></p></a>
		</div>
	
		<div class="col-md-3 " >		
			
		</div>	
	</div>
	<div class="container" style="width:30%">
	<div class="row" style="text-slign:center;"> <h1 >Admin Panel</h1></div>
	</div>
	<div class="row" >			
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
					<ul class="nav navbar-nav">						 
											
					@if (Auth::check() && Auth::user()->admin == 1)			
						<li><a href="{{ URL::to('/admin') }}">Admin Panel</a></li>
						<li><a href="{{ URL::to('/admin/slides') }}">Slider</a></li>
						<li><a href="{{ URL::to('/admin/boxes') }}">Forside Bokser</a></li>
						{{-- <li><a href="{{ URL::to('/admin/createPage') }}">Create Page</a></li> --}}
						<li><a href="{{ URL::to('/admin/listPages') }}"> Sider</a></li>	
						{{-- <li><a href="{{ URL::to('/admin/listUsers') }}"> Users</a></li> --}}
						<li><a href="{{ URL::to('/admin/listCategory') }}">Kategorier</a></li>	
						<li><a href="{{ URL::to('/admin/listProducts') }}">Produkter</a></li>
						<li><a href="{{ URL::to('/admin/contact') }}">Kontakt</a></li>	
					
						<li><a href="{{ URL::to('/logout') }}">Logout</a></li>			 			
					@endif		
						
						
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="row" style="background-color:white;">
		@yield('content')
		
		
	</div>

	<div class="footer">
	           
	
	</div>
				
		

		
			
	</div>