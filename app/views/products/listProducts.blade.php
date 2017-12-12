@extends('layouts.dashboard')

@section('title')
Produkt List
@stop
@section('content')

<a href="{{ URL::to('/admin/createProduct') }}" class="btn btn-primary" >Create Produkt</a>
<h3>Produkter</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			  <th>Varenummer</th>
      			<th>Navn</th>
            <th>Category</th>
            <th>Description</th>
            <th>image</th>
            <th>Pris</th>
            <th>Tilbud</th>      			
            <th>Edit</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($products as $product)
    		<tr>
        <td>{{$product->id}}</td>
        <td><a href="{{ URL::to('/admin/products/'.$product->id) }}">{{$product->name}}</a></td>
        <?php
           $cat = Category::where('id',$product->cat_id)->first()->name;
        ?>
        <td>{{$cat}}</td>
        <td>{{ nl2br(str_limit($product->description, $limit = 100, $end = '...'))}}</td>
        @if($product->image)
        <td><img src="{{ URL::to('/products/'.$product->image.'_thumb') }}" class="img-responsive"></td>
        @else
        <td>Ingen billede</td>
        @endif
        <td>{{$product->price}}</td>
        <td>{{$product->offerprice}}</td>
      
    			    			     				
     			
          <td><a href="{{ URL::to('/admin/editProduct/'.$product->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
      			<td><a href="{{ URL::to('/admin/deleteProduct/'.$product->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>
<center>{{ $products->links() }}</center>
@stop