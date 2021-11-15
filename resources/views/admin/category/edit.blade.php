@extends('layouts.admin')

@section('content')
<div class="container mt-5">

    <!-- Success message -->
    {{-- @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif --}}

    {{-- {{dd($edit_categories)}} --}}

    <form action="{{route('update.category', ['id'=>$edit_categories->id]) }}" method="post" enctype="multipart/form-data">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf
         {{ csrf_field() }}
         {{-- {{ method_field('PATCH') }} --}}
         {{-- @method('PATCH') --}}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"  value="{{$edit_categories->name}}">
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$edit_categories->slug}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control md-textarea rounded-0" name="description" cols="10" rows="4">{{$edit_categories->description}}</textarea>
                    </div>



                    <div class="checkbox">
                        <label><input type="checkbox" name="status[]"
                            {{$edit_categories->status == '1' ? 'checked' : ''}} > Status</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="popular[]"
                            {{$edit_categories->popular == '1' ? 'checked' : ''}}
                           >Popular</label>
                    </div>


                    <br/>


                    <div class="file-group">

                        <div class="d-flex justify-content-center">
                        <div class="btn float-left">
                            <img src="{{url($edit_categories->image)}}" alt="" srcset="">
                            <span style="background: gold">Upload New Category Image</span>
                            <input style="background: gold" type="file" name="image">
                        </div>
                        </div>
                    </div>

                    <br/>

                    <div class="form-group">
                        <label>Meta Title</label>
                        <textarea class="form-control md-textarea rounded-0" name="meta_title" cols="10" rows="4">{{$edit_categories->meta_title}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control md-textarea rounded-0" name="meta_descrip" cols="10" rows="4">{{$edit_categories->meta_descrip}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <textarea class="form-control md-textarea rounded-0" name="meta_keywords" cols="10" rows="4">{{$edit_categories->meta_keywords}}</textarea>
                    </div>


                    <input type="hidden" name="id" value="{{$edit_categories->id}}">

                    <input type="submit" value="Submit" class="btn btn-dark btn-block">
                </form>
</div>



@endsection
