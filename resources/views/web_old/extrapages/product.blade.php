<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Product Details
    </x-slot>

    <!-- product category -->
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container"><a
                                                        data-lens-image="{{ asset('storage/images/products/' . $product->image) }}"
                                                        class="simpleLens-lens-image">
                                                        <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                                            class="simpleLens-big-image" width="350px"
                                                            height="300px"></a></div>
                                            </div>
                                            <div class="simpleLens-thumbnails-container">

                                                <a data-big-image="{{ asset('storage/images/products/' . $product->image) }}"
                                                    data-lens-image="{{ asset('storage/images/products/' . $product->image) }}"
                                                    class="simpleLens-thumbnail-wrapper" href="#">
                                                    <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                                        width="35px" height="35px">

                                                </a>
                                                
                                                @foreach ($images as $image)
                                                    <a data-big-image="{{ asset('storage/images/products/' . $image->images) }}"
                                                        data-lens-image="{{ asset('storage/images/products/' . $image->images) }}"
                                                        class="simpleLens-thumbnail-wrapper" href="#">
                                                        <img src="{{ asset('storage/images/products/' . $image->images) }}"
                                                            width="35px" height="35px">

                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{ $product->name }}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price">Rs: {{ $product->price }}</span>
                                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                        </div>
                                        <p>
                                            {!! $product->name !!}
                                        </p>


                                        <div class="aa-prod-quantity">
                                            <form action="{{ url('cart') }}" method="post" class="create_cart">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="p_id">
                                                Qty : <input type="number" name="qty" value="1"
                                                    style="width:70px;">
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                            <button class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>
                                                Add To Cart
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#review" data-toggle="tab">Reviews</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    <p>{!! $product->long_desc !!}</p>
                                </div>
                                <div class="tab-pane fade " id="review">
                                    <div class="aa-product-review-area">
                                        <h4>({{ $count }}) Reviews </h4>
                                        <ul class="aa-review-nav">
                                            @foreach ($reviews as $review)
                                                <li>
                                                    <div class="media">

                                                        <div class="media-body">

                                                            <h4 class="media-heading">
                                                                <strong>{{ $review->name }}</strong> -
                                                                <span>{{ $review->created_at }}</span>
                                                            </h4>
                                                            <div class="aa-product-rating">
                                                                <div class="star-rating"
                                                                    style="width: 100px; height: 20px; background-size: 20px;"
                                                                    data-rating="{{ @$review->rating }}">
                                                                    <div class="star-value"
                                                                        style="background-size: 20px; width: {{ @$review->rating * 20 }}%;">
                                                                    </div>
                                                                </div>
                                                                <p>{{ $review->comment }}</p>
                                                            </div>
                                                        </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @if (Auth::guard('web')->user())
                                            <h4>Add a review</h4>
                                            <!-- review form -->
                                            <form action="{{ url('/review') }}" method="post" class="aa-review-form">
                                                @csrf
                                                <div class="aa-your-rating">
                                                    <p>Your Rating</p>
                                                    <div id="rater"></div>
                                                    <input type="hidden" name="rating" id="ratting"
                                                        value="{{ old('rating') }}">
                                                    <input type="hidden" name="pid" value="{{ $product->id }}">
                                                    <input type="hidden" name="uid"
                                                        value="{{ Auth::guard('web')->user()->id }}">

                                                </div>

                                                <div class="form-group">
                                                    <label for="message">Your Review</label>
                                                    <textarea name="comment" class="form-control" rows="3" id="message"></textarea>
                                                </div>

                                                <button type="submit"
                                                    class="btn btn-default aa-review-submit">Submit</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>



    </div>

    <x-slot name="footer">
        <script src="{{ asset('/assets/plugins/rater-js/star-ratting.js') }}"></script>
        <script src="{{ asset('/assets/plugins/rater-js/ratting-custom.js') }}"></script>
        <script>

        // function fetchdata() {
        //     $.ajax({
        //         type: "GET",
        //         url: "/fetch_data",
        //         success: function (data) {
        //           $('#cart').html(data);
        //         }
        //     });
        // }
        
        
        //     $('.create_cart').on('submit', function(e){
        //         e.preventDefault();
        //         $.ajax({
        //             url:$(this).attr('action'),
        //             type:"POST",
        //             data:$(this).serialize(),
        //             success:function(data){
        //                 if(data.status == 'success'){
        //                     $('#msg').html(`<div class="alert alert-success alert-dismissible" role="alert">
        //                     <strong>Success! </strong>` +data.message+`
        //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        //                     </div>`);  
                    
        //         }
        //         $('#cart').html("");
        //         fetchdata();    
                
        //             }
        //         });
        //     });
        
        </script>  

    </x-slot>
</x-web.app-layout>
