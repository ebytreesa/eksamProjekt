@extends('layouts.dashboard')

@section('title')
Create Category
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postCreateCategory', 'class' => 'form-horizontal','id' => 'createCat-form', 'files' => true)) }}
        <legend>Create Category</legend>

        <div class="form-group ">
            <label for="name" class="col-sm-2 col-md-1 control-label">Name</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="name" name="name" class="form-control {{ ($errors->has('name')) ? 'has-error' : '' }}" />
                @if ($errors->has('name'))
                    <strong style="color:red">
                        {{ $errors->first('name') }}
                    </strong>
                   @endif
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

        

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-8">
                <button type="submit" class="btn btn-primary">Create</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#createCat-form").validate({
        rules:{
             name:{
                required:true,

            }
            
        },

        messages:{
            name:{
                required: "attribute feltet skal udfyldes"
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