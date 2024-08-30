@php
    $url = url()->current();
@endphp


<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Home
    </x-slot>

    <div id="msg">

    </div>

    <!-- Start slider -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        @foreach ($sliders as $slider)
                            <li>
                                <div class="seq-model">

                                    <img data-seq src="{{ asset('storage/images/products/' . $slider->image) }}" />
                                </div>
                                {!! $slider->description !!}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->

    <!-- Start Promo section -->
    {{--<section id="aa-promo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-promo-area">
                        <div class="row">
                            <!-- promo left -->
                            <div class="col-md-5 no-padding">
                                <div class="aa-promo-left">
                                    <div class="aa-promo-banner">
                                        <img src="{{ asset('web_assets/img/promo-banner-1.jpg') }}" alt="img">
                                        <div class="aa-prom-content">
                                            <span>75% Off</span>
                                            <h4><a href="#">For Women</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- promo right -->
                            <div class="col-md-7 no-padding">
                                <div class="aa-promo-right">
                                    <div class="aa-single-promo-right">
                                        <div class="aa-promo-banner">
                                            <img src="{{ asset('web_assets/img/promo-banner-3.jpg') }}" alt="img">
                                            <div class="aa-prom-content">
                                                <span>Exclusive Item</span>
                                                <h4><a href="#">For Men</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aa-single-promo-right">
                                        <div class="aa-promo-banner">
                                            <img src="{{ asset('web_assets/img/promo-banner-2.jpg') }}" alt="img">
                                            <div class="aa-prom-content">
                                                <span>Sale Off</span>
                                                <h4><a href="#">On Shoes</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aa-single-promo-right">
                                        <div class="aa-promo-banner">
                                            <img src="{{ asset('web_assets/img/promo-banner-4.jpg') }}" alt="img">
                                            <div class="aa-prom-content">
                                                <span>New Arrivals</span>
                                                <h4><a href="#">For Kids</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aa-single-promo-right">
                                        <div class="aa-promo-banner">
                                            <img src="{{ asset('web_assets/img/promo-banner-5.jpg') }}" alt="img">
                                            <div class="aa-prom-content">
                                                <span>25% Off</span>
                                                <h4><a href="#">For Bags</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- / Promo section -->

    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    <li class="active"><a href="#laptop" data-toggle="tab">Laptop</a></li>
                                    <li><a href="#computer" data-toggle="tab">Computer</a></li>
                                    <li><a href="#accessory" data-toggle="tab">Accessories</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    <div class="tab-pane fade in active" id="laptop">
                                        <ul class="aa-product-catg">


                                            <!-- start single product item -->
                                            @foreach ($laptops as $laptop)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                            href="{{ url('product') }}/{{ $laptop->id }}">
                                                            <img src="{{ asset('storage/images/products/' . $laptop->image) }}"
                                                                width="250px" height="300px"></a>
                                                        <form action="{{ url('cart') }}" method="post"
                                                            class="create_cart">
                                                            @csrf
                                                            <input type="hidden" value="{{ $laptop->id }}"
                                                                name="p_id">
                                                            <input type="hidden" value="{{ $url }}"
                                                                name="url">
                                                            <input type="hidden" value="1" name="qty">
                                                            <button class="aa-add-card-btn"><span
                                                                    class="fa fa-shopping-cart"></span>
                                                                Add To Cart
                                                            </button>
                                                        </form>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="{{ url('product') }}/{{ $laptop->id }}">{{ $laptop->name }}</a>
                                                            </h4>
                                                            <span class="aa-product-price">Rs:
                                                                {{ number_format($laptop->price) }}</span>
                                                        </figcaption>
                                                    </figure>
                                                    {{-- <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Wishlist"><span
                                                                class="fa fa-heart-o"></span></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Compare"><span class="fa fa-exchange"></span></a>
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                            title="Quick View" data-toggle="modal"
                                                            data-target="#quick-view-modal"><span
                                                                class="fa fa-search"></span></a>
                                                    </div> --}}
                                                    <!-- product badge -->
                                                    {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- / men product category -->
                                    <!-- start Computer product category -->
                                    <div class="tab-pane fade" id="computer">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            @foreach ($computers as $computer)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                            href="{{ url('product') }}/{{ $computer->id }}">
                                                            <img src="{{ asset('storage/images/products/' . $computer->image) }}"
                                                                width="250px" height="300px"></a>
                                                        <form action="{{ url('cart') }}" method="post"
                                                            class="create_cart">
                                                            @csrf
                                                            <input type="hidden" value="{{ $computer->id }}"
                                                                name="p_id">
                                                            <input type="hidden" value="{{ $url }}"
                                                                name="url">
                                                            <input type="hidden" value="1" name="qty">
                                                            <button class="aa-add-card-btn"><span
                                                                    class="fa fa-shopping-cart"></span>
                                                                Add To Cart
                                                            </button>
                                                        </form>

                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="{{ url('product') }}/{{ $computer->id }}">{{ $computer->name }}</a>
                                                            </h4>
                                                            <span class="aa-product-price">Rs:
                                                                {{ number_format($computer->price) }}</span>
                                                        </figcaption>
                                                    </figure>
                                                    {{-- <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Wishlist"><span
                                                                class="fa fa-heart-o"></span></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Compare"><span class="fa fa-exchange"></span></a>
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                            title="Quick View" data-toggle="modal"
                                                            data-target="#quick-view-modal"><span
                                                                class="fa fa-search"></span></a>
                                                    </div> --}}
                                                    <!-- product badge -->
                                                    {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <!-- / Computer product category -->
                                    <!-- start accessories product category -->
                                    <div class="tab-pane fade" id="accessory">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            @foreach ($accessories as $accessory)
                                                <li>

                                                    <figure>
                                                        <a class="aa-product-img"
                                                            href="{{ url('product') }}/{{ $accessory->id }}">
                                                            <img src="{{ asset('storage/images/products/' . $accessory->image) }}"
                                                                width="250px" height="300px"></a>
                                                        <form action="{{ url('cart') }}" method="post"
                                                            class="create_cart">
                                                            @csrf
                                                            <input type="hidden" value="{{ $accessory->id }}"
                                                                name="p_id">
                                                            <input type="hidden" value="{{ $url }}"
                                                                name="url">
                                                            <input type="hidden" value="1" name="qty">
                                                            <button class="aa-add-card-btn"><span
                                                                    class="fa fa-shopping-cart"></span>
                                                                Add To Cart
                                                            </button>
                                                        </form>

                                                        <figcaption>
                                                            <h4 class="aa-product-title">
                                                                
                                                                <a href="{{ url('product') }}/{{ $accessory->id }}">{{ $accessory->name }}</a>
                                                            </h4>
                                                            <span class="aa-product-price">Rs:
                                                                {{ number_format($accessory->price) }}</span>
                                                        </figcaption>
                                                    </figure>

                                                    {{-- <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Wishlist"><span
                                                                class="fa fa-heart-o"></span></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Compare"><span class="fa fa-exchange"></span></a>
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                            title="Quick View" data-toggle="modal"
                                                            data-target="#quick-view-modal"><span
                                                                class="fa fa-search"></span></a>
                                                    </div> --}}
                                                    <!-- product badge -->
                                                    {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <!-- / sports product category -->

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- / Products section -->
    <!-- banner section -->
    <section id="aa-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-banner-area">
                            <a href="#"><img src="{{ asset('web_assets/img/fashion-banner.jpg') }}"
                                    alt="fashion banner img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular section -->
    <section id="aa-popular-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-popular-category-area">
                            <!-- start prduct navigation -->
                            <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                                <li><a href="#latest" data-toggle="tab">Latest</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start men popular category -->
                                <div class="tab-pane fade in active" id="popular">
                                    <ul class="aa-product-catg aa-popular-slider">

                                        <!-- start single product item -->
                                        @foreach ($populars as $popular)
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="{{ url('product') }}/{{ $popular->id }}"><img
                                                            src="{{ asset('storage/images/products/' . $popular->image) }}"
                                                            width="250px" height="300px"></a>
                                                            <form action="{{ url('cart') }}" method="post"
                                                            class="create_cart">
                                                            @csrf
                                                            <input type="hidden" value="{{ $popular->id }}"
                                                                name="p_id">
                                                            <input type="hidden" value="{{ $url }}"
                                                                name="url">
                                                            <input type="hidden" value="1" name="qty">
                                                            <button class="aa-add-card-btn"><span
                                                                    class="fa fa-shopping-cart"></span>
                                                                Add To Cart
                                                            </button>
                                                        </form>
    
                                                    <figcaption>
                                                        <h4 class="aa-product-title">
                                                            <a href="{{ url('product') }}/{{ $popular->id }}">{{ $popular->name }}</a>
                                                        </h4>    
                                                        <span class="aa-product-price">{{ number_format($popular->price) }}</span>
                                                    </figcaption>
                                                </figure>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-sale">Popular</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <!-- / popular product category -->

                                <!-- start featured product category -->
                                <div class="tab-pane fade" id="featured">
                                    <ul class="aa-product-catg aa-featured-slider">
                                        @foreach ($features as $feature)
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="{{ url('product') }}/{{ $feature->id }}"><img
                                                            src="{{ asset('storage/images/products/' . $feature->image) }}"
                                                            width="250px" height="300px"></a>
                                                            <form action="{{ url('cart') }}" method="post"
                                                            class="create_cart">
                                                            @csrf
                                                            <input type="hidden" value="{{ $feature->id }}"
                                                                name="p_id">
                                                            <input type="hidden" value="{{ $url }}"
                                                                name="url">
                                                            <input type="hidden" value="1" name="qty">
                                                            <button class="aa-add-card-btn"><span
                                                                    class="fa fa-shopping-cart"></span>
                                                                Add To Cart
                                                            </button>
                                                        </form>

                                                    <figcaption>
                                                        <h4 class="aa-product-title">
                                                            <a href="{{ url('product') }}/{{ $feature->id }}">{{ $feature->name }}</a>
                                                        </h4>
                                                        <span class="aa-product-price">{{ number_format($feature->price) }}</span>
                                                    </figcaption>
                                                </figure>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-sale">Feature</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- / featured product category -->



                                <!-- start latest product category -->
                                <div class="tab-pane fade" id="latest">
                                    <ul class="aa-product-catg aa-latest-slider">
                                        <!-- start single product item -->
                                        @foreach ($latest as $latest)
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="{{ url('product') }}/{{ $latest->id }}"><img
                                                            src="{{ asset('storage/images/products/' . $latest->image) }}"
                                                            width="250px" height="300px"></a>
                                                            <form action="{{ url('cart') }}" method="post"
                                                            class="create_cart">
                                                            @csrf
                                                            <input type="hidden" value="{{ $latest->id }}"
                                                                name="p_id">
                                                            <input type="hidden" value="{{ $url }}"
                                                                name="url">
                                                            <input type="hidden" value="1" name="qty">
                                                            <button class="aa-add-card-btn"><span
                                                                    class="fa fa-shopping-cart"></span>
                                                                Add To Cart
                                                            </button>
                                                        </form>
                                                    <figcaption>
                                                        <h4 class="aa-product-title">
                                                            <a href="{{ url('product') }}/{{ $latest->id }}">{{ $latest->name }}</a>
                                                        </h4>
                                                        <span class="aa-product-price">{{ number_format($latest->price) }}</span>
                                                    </figcaption>
                                                </figure>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-sale">Latest</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- / latest product category -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / popular section -->



    <!-- Support section -->
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                                <P>Free Home Delivery in 2 working days when you spend Rs: 35000</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock"></span>
                                <h4>07 DAYS MONEY BACK</h4>
                                <P> If you are not satisfied with the product or service, you can get your money back..
                                </P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>SUPPORT 24/7</h4>
                                <P>We are always available to assist you. Please contact us for any query.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->


    <!-- Testimonial -->
    {{-- <section id="aa-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-testimonial-area">
                        <ul class="aa-testimonial-slider">
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img"
                                        src="{{ asset('web_assets/img/testimonial-img-2.jpg') }}"
                                        alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>Allison</p>
                                        <span>Designer</span>
                                        <a href="#">Dribble.com</a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img"
                                        src="{{ asset('web_assets/img/testimonial-img-1.jpg') }}"
                                        alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>KEVIN MEYER</p>
                                        <span>CEO</span>
                                        <a href="#">Alphabet</a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img"
                                        src="{{ asset('web_assets/img/testimonial-img-3.jpg') }}"
                                        alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>Luner</p>
                                        <span>COO</span>
                                        <a href="#">Kinatic Solution</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- / Testimonial -->

    <!-- Client Brand -->
    <section id="aa-client-brand" style="background: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-client-brand-area">
                        <ul class="aa-client-brand-slider">
                            @foreach ($brands as $brand)
                                <li><a href="#"><img
                                            src="{{ asset('storage/images/products/' . $brand->image) }}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Client Brand -->

    <x-slot name="footer">

        <script>
            
            // function fetchdata() {
            //     $.ajax({
            //         type: "GET",
            //         url: "/fetch_data",
            //         success: function(data) {
            //             $('#cart').html(data);
            //         }
            //     });
            // }


            // $('.create_cart').on('submit', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         url: $(this).attr('action'),
            //         type: "POST",
            //         data: $(this).serialize(),
            //         success: function(data) {
            //             if (data.status == 'success') {
            //                 notification(data.status,data.message);

            //             }
            //             $('#cart').html("");
            //             fetchdata();

            //         }
            //     });
            // });



        </script>

    </x-slot>
</x-web.app-layout>
