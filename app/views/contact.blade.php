@extends('layouts.home')

@section('title')
kontakt
@stop

@section('content')


<div class="container" style="width:90%; padding-bottom:30px;">
	<h3 style=" font-weight:900; font-style:italic;margin-bottom:40px;">Kontakt</h3>
	<div class="col-sm-6">

	{{-- <form id="contact-form" class="form-horizontal"> --}}
	{{ Form::open(array('route' => 'postContact', 'class' => 'form-horizontal','id'=>'contact-form')) }}
		

        <div class="form-group ">
            <label for="fullname" class="col-sm-3 col-md-2 control-label pull-left">Navn</label>
            <div class="col-sm-9 col-md-10">
                <input type="text" id="fullname" name="name" class="form-control" />
            </div>
            {{-- <div class="col-sm-2 col-md-2"></div> --}}
        </div>
        
        <div class="form-group">
            <label for="email" class="col-sm-3 col-md-2 control-label pull-left">E-mail</label>
            <div class="col-sm-9 col-md-10">
                <input type="text" id="email" name="email" class="form-control"  />
            </div>
            {{--  <div class="col-sm-2 col-md-2"></div> --}}
        </div>

         <div class="form-group">
            <label for="subject" class="col-sm-3 col-md-2 control-label pull-left">Emne</label>
            <div class="col-sm-9 col-md-10">
                <input type="text" id="subject" name="subject" class="form-control"  />
          </div>
            {{--  <div class="col-sm-2 col-md-2"></div> --}}
        </div>

         <div class="form-group ">
            <label for="message" class="col-sm-3 col-md-2 control-label pull-left">Besked</label><br><br>
            <div class="col-sm-11 pull-right">
                <textarea type="textarea" id="message" name="message" class="form-control" rows="5" cols="40"></textarea>
            </div>
            {{--  <div class="col-sm-2 col-md-2"></div> --}}
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-primary">Send</button>

            </div>
        </div>
    {{form::close()}}
		
	</div> 
	<div class="col-sm-6" style="margin-top:0px; padding-bottom:70px;">
		 {{-- <iframe class="" style="margin-left:50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2222.551597069621!2d10.211937315945928!3d56.147566980660756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c3f85a6aa9a45%3A0x86f4114a0dba4e07!2sSilovej+2%2C+8000+Aarhus+C!5e0!3m2!1sen!2sdk!4v1506525421636" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
		 <?php
		 	$address = Address::first(); ?>
		 	<iframe src="{{ $address->link }}" style="margin-left:50px; " width="400" height="350" frameborder="0" allowfullscreen></iframe>
	</div>
</div>


<script>

  $(function () {
	$("#contact-form").validate({
		rules:{
		name:{
				required:true
			},
			email:{
				required:true,
				email:true
			},
			message:{
				required:true
			}
		},

		messages:{
			name:{
				required: "attribute feltet skal udfyldes"
			},
			email:{
				required: "attribute feltet skal udfyldes",
				email: "skriv en gyldig email adresse"
			},
			message:{
				required: "Skriv din besked her"
			}
		},

		submitHandler: function(form){
			
			form.submit();
		},
		

		 highlight: function (element, errorClass) {
                 $(element).closest('.form-group').addClass('has-error');
        } ,

          unhighlight: function (element, errorClass) {
                $(element).closest('.form-group').removeClass('has-error');
             },   
           

             	});

	});
	</script>

@stop