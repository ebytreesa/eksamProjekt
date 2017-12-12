
@extends('layouts.dashboard')

@section('title')
edit Box
@stop

@section('content')


<div class="container">
     {{ Form::open(array('route' => 'postEditBox', 'class' => 'form-horizontal','id' => 'editBox-form', 'files' => true)) }}
    {{ Form::hidden('id', $box->id) }}
        <legend>Edit Box</legend>

      

         <div class="form-group ">
            <label for="title" class="col-sm-2 col-md-1 control-label">Title</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="title" value="{{$box->title}}" name="title" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

         <div class="form-group ">
            <label for="content" class="col-sm-2 col-md-1 control-label">Content</label>
            <div class="col-sm-8 col-md-9">
                <textarea id="content" name="content" class="form-control " >{{$box->content}}</textarea> 
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
         
                 

         

        <div class="form-group ">
            <label for="link" class="col-sm-2 col-md-1 control-label">Link til side</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="link" value="{{$box->link}}" name="link" class="form-control " />
                
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
    $("#editBox-form").validate({
        rules:{
            title:{
                required:true,

            }       
            
        },

        messages:{
            title:{
                required: " feltet skal udfyldes"
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
   
    
</div>
    
@stop