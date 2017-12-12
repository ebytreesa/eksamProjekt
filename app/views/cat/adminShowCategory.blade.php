@extends('layouts.dashboard')

@section('title')
{{ $cat->name }}
@stop

@section('content')
<a href="{{ URL::to('/admin/editCategory/'.$cat->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
<a  style="margin-left:20px;" href="{{ URL::to('/admin/deleteCategory/'.$cat->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
<hr style="border-color: grey;">


 
	
	<div class="row">
<div class="container" style="width:90%; padding-bottom:30px;">
	<h3 style=" font-weight:900; font-style:italic;">Produkter >> {{$cat->name}}</h3><br>
	@foreach($products as $product)
		<div class="col-sm-3">
			<img src="{{ URL::to('/products/'.$product->image) }}" class="img-responsive" style="height:200px; width:200px; border:1px solid grey;" >
			<h4 style="font-weight:700">{{ $product->name }}</h4><br>
			@if($product->offerprice == '0')
				<h5 style="font-weight:700">pris: {{ $product->price }},-</h5>
			@else
				<h5 style="color:grey; font-weight:700">Førpris: {{ $product->price }},-</h5>
				<h5 style="font-weight:700">Tilbudpris: {{ $product->offerprice }},-</h5>
			@endif
		
			<a href="{{ URL::to('/product/'.$product->id) }}"><h4 style="color:blue; font-weight:700"> Læs mere >> </h4></a>
		</div>
	@endforeach
</div>

</div>
	

 

@stop
