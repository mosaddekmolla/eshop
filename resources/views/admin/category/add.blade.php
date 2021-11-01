@extends('layouts.admin')

@section('content')
<div class="container mt-5">

    <!-- Success message -->
    {{-- @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif --}}

    <form action="{{route('insert.category')}}" method="post" enctype="multipart/form-data">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" >
        </div>
        
        <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control" name="slug" >
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control md-textarea rounded-0" name="description" cols="10" rows="4"></textarea>
        </div>

      

        <div class="checkbox">
            <label><input type="checkbox" name="status" value="">Status</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="popular" value="">Popular</label>
        </div>


          <br/>
       

        <div class="file-group">
           
            <div class="d-flex justify-content-center">
              <div class="btn float-left">
                <span>Upload Category Image</span>
                <input type="file" name="image">
              </div>
            </div>
          </div>

          <br/>

        <div class="form-group">
            <label>Meta Title</label>
            <textarea class="form-control md-textarea rounded-0" name="meta_title" cols="10" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label>Meta Description</label>
            <textarea class="form-control md-textarea rounded-0" name="meta_descrip" cols="10" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label>Meta Keywords</label>
            <textarea class="form-control md-textarea rounded-0" name="meta_keywords" cols="10" rows="4"></textarea>
        </div>

        <input type="submit" value="Submit" class="btn btn-dark btn-block">
    </form>
</div>
    
    
@endsection
