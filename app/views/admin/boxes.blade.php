
@extends('layouts.dashboard')

@section('title')
Bokser
@stop

@section('content')


<div class="container" style="width:98%;padding-bottom:30px; ">
    <h3>Bokser</h3>
    
        @foreach($boxes as $box)
            <div class="col-sm-3" style="width:23%; border:1px  grey;margin-right:22px; background-color:#D0D0D0; padding-bottom: 15px; ">
               <h3 style="text-align:center; color:white; font-weight:800;"> {{ $box->title }}</h3>
               <p style="text-align:center;">{{ $box->content }}</p>
               <div style="margin-top:20px;">
                <a href="{{ URL::to('/admin/editBox/'.$box->id) }}" class="btn btn-primary" style="margin-left:40%;" >Ret</a>
               </div>
            </div>
        @endforeach      
     
  
  
    
</div>
    
@stop