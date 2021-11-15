@extends('layouts.admin')

@section('content')

        {{-- @if(Session::has('flash_message'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('flash_message') }}</p>
        @endif --}}

        <div class="card-header">
            <h4>Product Page</h4>
        </div>

        <div class="card-body">


            <table class="table">
                <thead >


                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Selling Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                    <tr>
                            <td scope="row">{{$product->id}}</td>
                            <td>{{$product->one_to_one_relation_with_category->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->selling_price}}</td>

                            <td>
                                <img src="{{ url($product->image) }}"  class="cate-image"alt="">
                            </td>

                            <td>
                                <button class="btn btn-success btn-sm">
                                    <a href={{ url('edit-product', ['id'=>$product->id]) }}>Edit</a>
                                </button>
                            </td>

                            <td>
                                <button class="btn btn-danger btn-sm">
                                    <a href={{ url('delete-product', ['id'=>$product->id]) }}>Delete</a>
                                </button>

                            </td>

                        </tr>

                    @endforeach
                    </tbody>


    </table>
     {{-- {{$categories->links()}} --}}

     <!-- Showing Pagination Links -->
	<style>
		ul {display:inline-block}
		li {display:inline; padding:5px}
	</style>
	<div> {{ $products->links() }} </div>
	<!-- End Showing Pagination Links -->

</div>
@endsection
