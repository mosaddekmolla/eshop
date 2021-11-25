<!--recommended_items-->
<div class="recommended_items">
    <h2 class="title text-center">Trending Items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($trending_products as $trending_products)
            <div class="item active">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{$trending_products->image}}" alt="" class="img-responsive img-fluid" />
                                <h2>Selling Price:{{$trending_products->selling_price}}</h2>
                                <h4>Original Price: <s>{{$trending_products->original_price}} Tk </s></h4>
                                <p>{{$trending_products->name}}</p>
                                <p>{{$trending_products->description}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
    </div>
</div>

<!--/recommended_items-->
