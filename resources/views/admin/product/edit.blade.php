@extends('layouts.admin')

@section('content')
<div class="container mt-5">

    <!-- Success message -->
    {{-- @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif --}}

    <form action="{{route('update.product', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">

        <!-- CROSS Site Request Forgery Protection -->
        {{ method_field('PUT') }}
        {{ csrf_field() }}

            <label for="category_id"> Select Category</label>
                <select class="custom-select" name="category_id" id="category_id" required>
                    <option >Category</option>

                        <option value="{{$product->category_id}}">{{$product->name}}</option>
                </select>




            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>

            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
            </div>

            <div class="form-group">
                <label>Description </label>
                <input type="text" class="form-control" name="description" value="{{$product->description}}">
            </div>


            <div class="form-group">
                <label>Small Description </label>
                <input type="text" class="form-control" name="s_descrip" value="{{$product->s_descrip}}">
            </div>

            <div class="form-group">
                <label>Original Price</label>
                <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}">
            </div>

            <div class="form-group">
                <label>Selling Price</label>
                <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
            </div>


            <div class="form-group">
                <label>Quantity</label>
                <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
            </div>

            <div class="form-group">
                <label>Tax</label>
                <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
            </div>

{{--
            <div class="checkbox">
                <label><input type="checkbox" name="status[]" value="{{$product->status == '1' ? 'checked' : ''}}">Status</label>
            </div> --}}

            <div class="checkbox">
                <label><input type="checkbox" name="status[]"
                    {{$product->status == '1' ? 'checked' : ''}} > Status</label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" name="trending[]" {{$product->trending== '1' ? 'checked' : ''}} >Trending</label>
            </div>


            <br/>


            <div class="file-group">

                <div class="d-flex justify-content-center">
                <div class="btn float-left">
                    <img src="{{url($product->image)}}" alt="" srcset="">
                    <span style="background: gold" class="ingredient">Changed Product Image</span>
                    <input style="background: gold" type="file" name="image">
                </div>
                </div>
            </div>

            <br/>

            <div class="form-group">
                <label>Meta Title</label>
                <textarea class="form-control md-textarea rounded-0" name="meta_title" cols="10" rows="4">{{$product->meta_title}}</textarea>
            </div>

            <div class="form-group">
                <label>Meta Description</label>
                <textarea class="form-control md-textarea rounded-0" name="meta_descrip" cols="10" rows="4">{{$product->meta_descrip}}</textarea>
            </div>

            <div class="form-group">
                <label>Meta Keywords</label>
                <textarea class="form-control md-textarea rounded-0" name="meta_keywords" cols="10" rows="4">{{$product->meta_keywords}}</textarea>
            </div>

            <input type="submit" value="Submit" class="btn btn-dark btn-block">
    </form>
</div>


@endsection
