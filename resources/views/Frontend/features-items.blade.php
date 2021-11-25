<!--features_items-->

<div class="features_items">
    <h2 class="title text-center">Features Products</h2>
    @foreach ($features_products as $features_products)

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{url($features_products->image)}}" alt="" />
                    {{-- <img src="{{asset('assets/images/uploads/product/' . $featured_products->image)}}" alt="" /> --}}
                        <h2>Selling Price: {{$features_products->selling_price}} Tk</h2>
                        <h4>Original Price: <s>{{$features_products->original_price}} Tk </s></h4>
                        <p>{{$features_products->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$features_products->selling_price}} Tk</h2>
                            <p>{{$features_products->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach


</div>

<!--features_items-->
