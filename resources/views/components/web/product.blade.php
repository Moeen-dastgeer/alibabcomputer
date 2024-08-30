<div class="product product-2">
    <figure class="product-media">
        {{-- <span class="product-label label-circle label-top">Top</span> --}}
        <a href="{{ url('product/'.$slug) }}">
            <img src="{{ asset('storage/images/products/'.$image) }}" alt="Product image" class="product-image">
        </a>

        <div class="product-action-vertical">
            <a href="javascript:void(0);" class="btn-product-icon btn-wishlist" title="Add to wishlist" onclick="create_wish( {{ $id }})"></a>
        </div><!-- End .product-action -->
            <div class="product-action">
                <input type="hidden" class="qty" name="qty" value="1">
                <a href="javascript:void(0);" class="btn-product btn-cart" title="Add to cart" onclick="create_cart( {{ $id }})">Add To Cart</a>
                {{-- <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a> --}}
            </div>
        <!-- End .product-action -->
    </figure><!-- End .product-media -->

    <div class="product-body">
        <div class="product-cat">
            {{-- <a href="#">Laptops</a> --}}
        </div><!-- End .product-cat -->
        <h3 class="product-title"><a href="{{ url('product/'.$slug) }}"> {{ Str::limit($name, 50, '...') }} </a></h3><!-- End .product-title -->
        <div class="product-price">
           PKR {{ number_format($price) }}
           @if ($discountprice >0 )
           <sup>PKR <s>{{number_format($discountprice+$price )}}</s></sup>
           @endif
        </div><!-- End .product-price -->
        <div class="ratings-container">
            <div class="ratings">
                <div class="ratings-val" style="width: {{ $avg * 20 }}%;"></div><!-- End .ratings-val -->
            </div><!-- End .ratings -->
            <span class="ratings-text">( {{$reviews}} Reviews )</span>
        </div><!-- End .rating-container -->
    </div><!-- End .product-body -->
</div><!-- End .product --> 