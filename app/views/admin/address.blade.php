
@extends('layouts.dashboard')

@section('title')
Kontakt
@stop

@section('content')


<div class="container" style="width:80%;">
    <h3>Address</h3>
    <div class="row">
        <div class="col-sm-6">
            <span>{{ $address->name }}</span><br>
            <span>{{ $address->street }}</span><br>
            <span>{{ $address->city }}</span><br><br><br>
            <span>{{ $address->email }}</span><br>
            <span><strong>Tlf:</strong>{{ $address->phone }}</span><br><br>
            <span><strong>GPS:</strong>{{ $address->gps }}</span>
    
    
             <div style="margin-top:20px;">
                <a href="{{ URL::to('/admin/editContact/'.$address->id) }}" class="btn btn-primary" >Edit</a>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="col-sm-6" style="margin-top:0px; padding-bottom:70px;">
         {{-- <iframe class="" style="margin-left:50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2222.551597069621!2d10.211937315945928!3d56.147566980660756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c3f85a6aa9a45%3A0x86f4114a0dba4e07!2sSilovej+2%2C+8000+Aarhus+C!5e0!3m2!1sen!2sdk!4v1506525421636" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
         <?php
            $address = Address::first(); ?>
            <iframe src="{{ $address->link }}" style="margin-left:50px; " width="400" height="350" frameborder="0" allowfullscreen></iframe>
    </div>
            
        </div>
   </div>
    
</div>
    
@stop