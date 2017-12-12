@extends('layouts.dashboard')

@section('title')
Edit page
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postEditPage', 'class' => 'form-horizontal','id' => 'editPage-form', 'files' => true)) }}
    {{ Form::hidden('id', $page->id) }}
        <legend>Edit Page</legend>

       <div class="form-group ">
            <label for="slug" class="col-sm-2 col-md-1 control-label">Slug</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="slug" name="slug" value="{{$page->slug}}" class="form-control {{ ($errors->has('slug')) ? 'has-error' : '' }}" />
                @if ($errors->has('slug'))
            <strong style="color:red">
                {{ $errors->first('slug') }}
            </strong>
        @endif
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

         <div class="form-group ">
            <label for="title" class="col-sm-2 col-md-1 control-label">Title</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="title" value="{{$page->title}}" name="title" class="form-control " />
                
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
        
        <div class="form-group">
            <label for="content" class="col-sm-2 col-md-1 control-label">Content</label>
            <div class="col-sm-8 col-md-9 ">
                 <textarea type="textarea" id="content" name="content" value= ""  class="form-control" rows="5" cols="40">{{$page->content}}</textarea>
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>
      
       

         <div class="form-group">
            <label for="picture" class="col-sm-2 col-md-1 control-label">Billede</label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="picture" id="file" class="formm-control" />
            </div>
        </div>

         <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <div class="checkbox">
                    <label><input  type="checkbox" checked="checked" name="visible" value="no" />show page</label><!--<br />-->
                </div>
                
            </div>
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
    $("#editPage-form").validate({
        rules:{
            slug:{
                required:true,

            },
            title:{
                required:true,

            },
            content:{
                required:true,
                
            }
            
        },

        messages:{
            slug:{
                required: "attribute feltet skal udfyldes"
            },
            title:{
                required: "attribute feltet skal udfyldes"
            },
            content:{
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