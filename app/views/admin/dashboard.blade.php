@extends('layouts.dashboard')

@section('title')
AdminPanel
@stop

@section('content')


<div class="container" style="width:80%;">
    
  

@if (Auth::check() && Auth::user()->admin == 1)
    {{-- <li><a href="{{ URL::to('/admin/dashboard') }}">Admin Panel</a></li>
    <li><a href="{{ URL::to('/admin/createPage') }}">Create Page</a></li>
    <li><a href="{{ URL::to('/admin/listPages') }}"> Pages</a></li> 
    <li><a href="{{ URL::to('/admin/listUsers') }}"> Users</a></li>    --}} 
    <div class="row" style="margin-bottom:20px;">
    	<div class="col-sm-6">
    		<a href="{{ URL::to('/admin/slides') }}" class="btn btn-success" style="width:90%; height:75px;" "><h3>Slider</h3></a>
    	</div> 

    	<div class="col-sm-6">
    		<a href="{{ URL::to('/admin/boxes') }}" class="btn btn-success" style="width:90%; height:75px;" "><h3>Forside Boxer</h3></a>
    	
    	</div>
    </div>

    <div class="row" style="margin-bottom:20px;">
    	<div class="col-sm-6">
    		<a href="{{ URL::to('/admin/listPages') }}" class="btn btn-success" style="width:90%; height:75px;" "><h3>Sider</h3></a>
    	</div> 

    	<div class="col-sm-6">
    		<a href="{{ URL::to('/admin/contact') }}" class="btn btn-success" style="width:90%; height:75px;" "><h3>Kontakt</h3></a>
    	
    	</div>
    </div>

    <div class="row" style="margin-bottom:20px;"">
    	<div class="col-sm-6" >
    		<a href="{{ URL::to('/admin/listCategory') }}" class="btn btn-success" style="width:90%; height:75px;" "><h3>Kategorier</h3></a>
    	</div> 

    	<div class="col-sm-6">
    		<a href="{{ URL::to('/admin/listProducts') }}" class="btn btn-success" style="width:90%; height:75px;" "><h3>Produkter</h3></a>
    	
    	</div>
    </div>            
@endif

@stop