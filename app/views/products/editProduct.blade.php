@extends('layouts.dashboard')

@section('title')
Create produkt
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postEditProduct', 'class' => 'form-horizontal','id' => 'editProduct-form', 'files' => true)) }}
    {{ Form::hidden('id', $product->id)}}
        <legend>Edit Page</legend>

        <div class="form-group ">
            <label for="name" class="col-sm-2 col-md-1 control-label">Name</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control {{ ($errors->has('name')) ? 'has-error' : '' }}" />
                @if ($errors->has('name'))
            <strong style="color:red">
                {{ $errors->first('name') }}
            </strong>
        @endif
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

       


        <div class="form-group">
            <label for="category" class="col-sm-2 col-md-1 control-label">Kategory</label>
            <div class="col-sm-8 col-md-9">
            <select name="category" id="category" class="col-sm-8 col-md-9 form-control "> 
                    <?php
            $cat =Category::orderBy('name','asc')->get();
            ?>
            <option selected disabled="disabled">Vælg </option>
            @foreach($cat as $cat)
                     
            <option value="{{ $cat->id }}" data="{{ $cat->id }}"   >{{ $cat->name }}</option>
            @endforeach
            </select>
           
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

        
        
        <div class="form-group">
            <label for="description" class="col-sm-2 col-md-1 control-label">Description</label>
            <div class="col-sm-8 col-md-9 ">
                 <textarea type="textarea" id="description" name="description" class="form-control" rows="5" cols="40">{{$product->description}}</textarea>
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

        
       

         <div class="form-group">
            <label for="picture" class="col-sm-2 col-md-1 control-label">Billede</label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="picture" id="file" class="form-control" />
            </div>
        </div>

          <div class="form-group ">
            <label for="price" class="col-sm-2 col-md-1 control-label">Price</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="price" name="price" class="form-control " value="{{$product->price}}"/>                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

         <div class="form-group ">
            <label for="offer" class="col-sm-2 col-md-1 control-label">Tibud pris</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="offer" name="offer" class="form-control " value="{{$product->offerprice}}" />                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-8">
                <button type="submit" class="btn btn-primary">Gem</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#editProduct-form").validate({
        rules:{
             name:{
                required:true,

            },
                       price:{
                required:true,

            },
            category:{
                required:true,

            }
           
            
        },

        messages:{
             name:{
                required: "attribute feltet skal udfyldes"
            },
           
            price:{
                required: "attribute feltet skal udfyldes"
            },
            category:{
                required: "vælg en kategory"
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