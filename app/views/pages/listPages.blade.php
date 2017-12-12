@extends('layouts.dashboard')

@section('title')
Page List
@stop
@section('content')

<a href="{{ URL::to('/admin/createPage') }}" class="btn btn-primary" >Create Page</a>
<h3>Page List</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			<th>slug</th>
      			<th>Title</th>
      			<th>content</th>
            <th>Image</th>
            <th>Visible</th>
            <th>Edit</th>
      		{{-- 	<th>Slet</th> --}}
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($pages as $page)
    		<tr>
    			<td><a href="{{ URL::to('/admin/pages/'.$page->id) }}">{{ $page->slug }}</a></td>
     			<td> {{ $page->title }}</td>     				
     			<td>{{ nl2br(str_limit($page->content, $limit = 100, $end = '...'))}}</td>
          @if ($page->image)
          <td><img src="{{ URL::to('/images/'.$page->image.'_thumb') }}" class="img-responsive"></td>
          @else
          <td>ingen billede</td>
          @endif
          @if ($page->visible === 0)
          <td>unvisible</td>
          @else
          <td>visible</td>
          @endif
          <td><a href="{{ URL::to('/admin/editPage/'.$page->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
      		{{-- 	<td><a href="{{ URL::to('/admin/deletePage/'.$page->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td> --}}
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>

@stop