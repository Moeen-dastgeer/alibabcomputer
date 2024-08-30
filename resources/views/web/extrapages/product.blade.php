
<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Product Details
    </x-slot>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
                {{-- 
                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav --> --}}
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom"
                                            src="{{ asset('storage/images/products/' . $product->image) }}"
                                            data-zoom-image="{{ asset('storage/images/products/' . $product->image) }}"
                                            alt="product image">
                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#"
                                            data-image="{{ asset('storage/images/products/' . $product->image) }}"
                                            data-zoom-image="{{ asset('storage/images/products/' . $product->image) }}">
                                            <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                                alt="product side">
                                        </a>
                                        @foreach ($images as $image)
                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('storage/images/products/' . $image->images) }}"
                                                data-zoom-image="{{ asset('storage/images/products/' . $image->images) }}">
                                                <img src="{{ asset('storage/images/products/' . $image->images) }}"
                                                    alt="product cross">
                                            </a>
                                        @endforeach
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details" id="product-details">
                                <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: {{ $rating * 20 }}%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">(
                                        {{ $count }} Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    PKR {{ number_format($product->price) }}
                                    @if($product->discount_price > 0)
                                    <sup>PKR <s>{{number_format($product->discount_price+$product->price)}}</s></sup>
                                    @endif
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{{ $product->short_desc }} </p>
                                </div><!-- End .product-content -->
                                {{-- 
                                <div class="details-filter-row details-row-size">
                                    <label>Color:</label>

                                    <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="assets/images/products/single/1-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                        </a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .details-filter-row --> --}}
                                <form id="form">
                                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                                    @if ($variants_count > 0)
                                        <div class="details-filter-row details-row-size">
                                            @if($variants_values[0]->variant_type_id==4)
                                                <label for="size">Hardisk:</label>
                                            @else
                                                <label for="size">RAM:</label>
                                            @endif
                                            <div class="select-custom">
                                                <select name="size" id="size" class="form-control size">
                                                    @foreach ($variants_values as $variant_value)
                                                        <option value="{{ $variant_value->price }}" {{$variant_value->price==$product->price?'selected':''}}>{{ $variant_value->variant_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .details-filter-row -->
                                    @endif
                                    <div class="details-filter-row details-row-size my-5">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            @php 
                                                $qty = 1;
                                            @endphp
                                            <input type="number" class="qty qty1" id="qty1" name="qty"
                                                value="{{$qty}}" class="form-control" min="1" max="10"
                                                step="1" data-decimals="0">
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                </form>
                                <div class="product-details-action">
                                    <div href="javascript:void(0);" class="btn-product btn-cart"
                                        onclick="create_cart({{ $product->id }})"><span>add to cart</span></div>
                                    <div class="details-action-wrapper">
                                        <a href="javascript:void(0);" class="btn-product btn-wishlist" title="Wishlist"
                                            onclick="create_wish( {{ $product->id }})"><span>Add to
                                                Wishlist</span></a>
                                        {{-- <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to
                                                Compare</span></a> --}}
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                {{-- <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div><!-- End .product-cat --> --}}

                                <!--<div class="social-icons social-icons-sm">-->
                                <!--    <span class="social-label">Share:</span>-->
                                <!--    <a href="#" class="social-icon" title="Facebook" target="_blank"><i-->
                                <!--            class="icon-facebook-f"></i></a>-->
                                <!--    <a href="#" class="social-icon" title="Twitter" target="_blank"><i-->
                                <!--            class="icon-twitter"></i></a>-->
                                <!--    <a href="#" class="social-icon" title="Instagram" target="_blank"><i-->
                                <!--            class="icon-instagram"></i></a>-->
                                <!--    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i-->
                                <!--            class="icon-pinterest"></i></a>-->
                                <!--</div>-->
                                {{-- </div><!-- End .product-details-footer --> --}}
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->
                <div class="container">
                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab"
                                    href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                    aria-selected="false">Reviews
                                    ({{ $count }})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <p>
                                        {!! $product->long_desc !!}
                                    </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                                aria-labelledby="product-review-link">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="reviews">
                                            <h3>Reviews ({{ $count }})</h3>
                                            @foreach ($reviews as $review)
                                                <div class="review">
                                                    <div class="row no-gutters">
                                                        <div class="col-auto">
                                                            <h4><a href="#">{{ $review->name }}</a></h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val"
                                                                        style="width: {{ @$review->rating * 20 }}%;">
                                                                    </div>
                                                                    <!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->
                                                            <span class="review-date">{{ $review->created_at }}</span>
                                                        </div><!-- End .col -->
                                                        <div class="col">
                                                            {{-- <h4>Good, perfect size</h4> --}}

                                                            <div class="review-content">
                                                                <p>{{ $review->comment }}</p>
                                                            </div><!-- End .review-content -->
                                                            {{-- 
                                                            <div class="review-action">
                                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                            </div><!-- End .review-action --> --}}
                                                        </div><!-- End .col-auto -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .review -->
                                            @endforeach
                                        </div><!-- End .reviews -->
                                    </div>
                                    <div class="col-md-6">
                                        @if (Auth::guard('web')->user())
                                            <h4 class="text-center mt-3">Add a review</h4>
                                            <!-- review form -->
                                            <div class="text-center">
                                                <form action="{{ url('/review') }}" method="post">
                                                    @csrf
                                                    <div class="aa-your-rating">
                                                        <p>Your Rating</p>
                                                        <div id="rater"></div>
                                                        <input type="hidden" name="rating" id="ratting"
                                                            value="{{ old('rating') }}">
                                                        <input type="hidden" name="pid"
                                                            value="{{ $product->id }}">
                                                        <input type="hidden" name="uid"
                                                            value="{{ Auth::guard('web')->user()->id }}">

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message">Your Review</label>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-8">
                                                                <textarea name="comment" class="form-control" rows="3" id="message">{{ old('comment') }}</textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        @else
                                            <p><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        @foreach ($related as $relate)
                            @php
                                $f = 0;
                                $avg = 0;
                                $sum = 0;
                                foreach ($reviews as $review) {
                                    if ($relate->id == $review->product_id) {
                                        $sum += $review->rating;
                                        $f++;
                                    }
                                }
                                if ($f > 0) {
                                    $avg = $sum / $f;
                                }
                            @endphp
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    {{-- <span class="product-label label-new">New</span> --}}
                                    <a href="{{ url('product/' . $relate->slug) }}">
                                        <img src="{{ asset('storage/images/products/' . $relate->image) }}"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript:void(0);"
                                            class="btn-product-icon btn-wishlist btn-expandable"
                                            onclick="create_wish( {{ $relate->id }})"><span>add to
                                                wishlist</span></a>
                                        {{-- <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                        title="Quick view"><span>Quick view</span></a> --}}
                                        {{-- <a href="#" class="btn-product-icon btn-compare"
                                        title="Compare"><span>Compare</span></a> --}}
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <input type="hidden" class="qty" value="1">
                                        <a href="javascript:void(0);" class="btn-product btn-cart"
                                            onclick="create_cart( {{ $relate->id }})"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        {{-- <a href="#">Women</a> --}}
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ url('product/' . $relate->slug) }}">{{ $relate->name }}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($relate->price) }}
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $avg * 20 }}%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{ $f }} Reviews )</span>
                                    </div><!-- End .rating-container -->
                                    {{-- 
                                    <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                        </a>

                                        <a href="#">
                                            <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                        </a>
                                    </div><!-- End .product-nav --> --}}
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach

                    </div><!-- End .owl-carousel -->
                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <x-slot name="footer">
        <script src="{{ asset('/assets/plugins/rater-js/star-ratting.js') }}"></script>
        <script src="{{ asset('/assets/plugins/rater-js/ratting-custom.js') }}"></script>
        <script> 
          $(document).ready(function() {    
                $(document).on('change', '.size', function(event) {
                    event.preventDefault();
                    selectmemory();
                    });   
                function selectmemory() {
                    $.ajax({
                    url: "{{url('product-price-filter')}}",
                    type: "GET",
                    data: $('#form').serialize(),
                    success: function(data) {
                        // alert('hello');
                        $('#product-details').html(data);
                    }
                    });
                }

            });
        </script>
    </x-slot>
</x-web.app-layout>
