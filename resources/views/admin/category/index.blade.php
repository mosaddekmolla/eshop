@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
        </div>

        <div class="card-body">
            
            
            <table class="table">
                <thead >
            
            
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td scope="row">{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>

                            <td>
                                <img src="{{ url($category->image) }}"  class="cate-image"alt="">
                            </td>
                            

                            <td>
                                <button class="btn btn-danger btn-sm">
                                    <a href={{ route('delete.category', ['id'=>$category->id]) }}>Delete</a>
                                </button>
                        
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">
                                    <a href={{ route('edit.category', ['id'=>$category->id]) }}>Edit</a>
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
	<div> {{ $categories->links() }} </div>
	<!-- End Showing Pagination Links -->
    
</div>
</div>
@endsection
