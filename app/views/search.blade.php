@extends('layouts.home')

@section('title')
Søg Resulter
@stop

@section('content')


<div class="row">
<div class="container" style="width:90%; padding-bottom:30px;">
	<h3 style=" font-weight:900; font-style:italic;">Søg resulter</h3><br>
	@if($products)
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
	@else
	<div>
		<h4>Der er fundet ingen resultator med din søgning</h4>
	</div>
	@endif
</div>

</div>

@stop