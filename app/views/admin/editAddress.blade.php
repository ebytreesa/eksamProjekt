
@extends('layouts.dashboard')

@section('title')
edit Kontakt
@stop

@section('content')


<div class="container">
     {{ Form::open(array('route' => 'postEditContact', 'class' => 'form-horizontal','id' => 'editContact-form', 'files' => true)) }}
    {{ Form::hidden('id', $address->id) }}
        <legend>Edit Kontakt</legend>

      

         <div class="form-group ">
            <label for="name" class="col-sm-2 col-md-1 control-label">Navn</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="name" value="{{$address->name}}" name="name" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
         <div class="form-group ">
            <label for="street" class="col-sm-2 col-md-1 control-label">Gade</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="street" value="{{$address->street}}" name="street" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
         <div class="form-group ">
            <label for="city" class="col-sm-2 col-md-1 control-label">By og pincode</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="city" value="{{$address->city}}" name="city" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
         <div class="form-group ">
            <label for="email" class="col-sm-2 col-md-1 control-label">E-mail</label>
            <div class="col-sm-8 col-md-9">
                <input type="email" id="email" value="{{$address->email}}" name="email" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
         <div class="form-group ">
            <label for="phone" class="col-sm-2 col-md-1 control-label">Tlf</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="phone" value="{{$address->phone}}" name="phone" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

         <div class="form-group ">
            <label for="gps" class="col-sm-2 col-md-1 control-label">GPS</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="gps" value="{{$address->gps}}" name="gps" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group ">
            <label for="link" class="col-sm-2 col-md-1 control-label">Link til google map</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="link" value="{{$address->link}}" name="link" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
        
       
      
       

        {{--  <div class="form-group">
            <label for="picture" class="col-sm-2 col-md-1 control-label">Billede</label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="picture" id="file" class="formm-control" />
            </div>
        </div> --}}

         
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-8">
                <button type="submit" class="btn btn-primary">Gem</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#editContact-form").validate({
        rules:{
            name:{
                required:true,

            },
           street:{
                required:true,

            },
            city:{
                required:true,
                
            },
            email:{
                required:true,
                 email:true

            },
            phone:{
                required:true,

            }            
            
        },

        messages:{
            name:{
                required: " feltet skal udfyldes"
            },
           street:{
                required: " feltet skal udfyldes"
            },
            city:{
                required: " feltet skal udfyldes"
                
            }
            email:{
                required: " feltet skal udfyldes",
                 email: "skriv en gyldig email adresse"
            },
            phone:{
                required: " feltet skal udfyldes"
            },
           
            
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
   
    
</div>
    
@stop