@php
    $url = url()->current();
@endphp

<x-web.app-layout>
    <x-slot name="header"></x-slot>
    <x-slot name="title"></x-slot>
    <main class="main">
        <div class="intro-slider-container">
            <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                    "nav": false,
                    "responsive": {
                        "992": {
                            "nav": true
                        }
                    }
                }'>
                @foreach ($sliders as $slider)
                <div class="intro-slide" style="background-image: url({{ asset('storage/images/products/' . $slider->image) }});">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                <h3 class="intro-subtitle">{{ $slider->intro }}</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">{!! $slider->title !!}
                                    {{-- <span>
                                        <sup class="font-weight-light">from</sup>
                                        <span class="text-primary">$999<sup>,99</sup></span>
                                    </span> --}}
                                </h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-primary-2">
                                    <span>Shop Now</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-auto offset-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->
                @endforeach

            </div><!-- End .owl-carousel owl-simple -->
            <span class="slider-loader"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->
        
        <div class="container">
            <h2 class="title text-center my-4 py-5">Explore Popular Categories</h2><!-- End .title text-center -->
            <div class="cat-blocks-container">
                <div class="row">
                    @foreach ($category as $category)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="{{ url('shop?category=' . $category->slug) }}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('assets/images/category') }}/{{ $category->image }}"
                                            alt="Category image">
                                    </span>
                                </figure>
                                <h3 class="cat-block-title">{{ $category->name }}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .cat-blocks-container -->
        </div><!-- End .container -->

        <div class="mb-4"></div><!-- End .mb-4 -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="{{ asset('web/assets/images/demos/demo-4/banners/banner-1.png') }}"
                                alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Smart Offer</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#">Save $150 <strong>on Samsung <br>Galaxy
                                        Note9</strong></a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="{{ asset('web/assets/images/demos/demo-4/banners/banner-2.jpg') }}"
                                alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Time Deals</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#"><strong>Bose SoundSport</strong> <br>Time Deal
                                    -30%</a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="{{ asset('web/assets/images/demos/demo-4/banners/banner-3.png') }}"
                                alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Clearance</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#"><strong>GoPro - Fusion 360</strong> <br>Save
                                    $70</a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-5 -->

        <div class="container new-arrivals">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">New Arrivals</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-link" data-toggle="tab" href="#all-tab" role="tab"
                                aria-controls="all-tab" aria-selected="true">all</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" id="{{ $category->slug }}-link" data-toggle="tab"
                                    href="#{{ $category->slug }}-tab" role="tab"
                                    aria-controls="{{ $category->slug }}-tab"
                                    aria-selected="true">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel just-action-icons-sm">
                <div class="tab-pane p-0 fade show active" id="all-tab" role="tabpanel" aria-labelledby="all-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": true, 
                            "dots": false,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
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
                                    "items":5
                                }
                            }
                        }'>
                        @foreach ($products as $product)
                            @php
                                $f = 0;
                                $avg = 0;
                                $sum = 0;
                                foreach ($reviews as $review) {
                                    if ($product->id == $review->product_id) {
                                        $sum += $review->rating;
                                        $f++;
                                    }
                                }
                                if ($f > 0) {
                                    $avg = $sum / $f;
                                }
                            @endphp
                            <x-web.product :id="$product->id" :slug="$product->slug" :avg="$avg" :reviews="$f"
                                :name="$product->name" :price="$product->price" :image="$product->image" :discountprice="$product->discount_price" />
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                @foreach ($categories as $category)
                    <div class="tab-pane p-0 fade" id="{{ $category->slug }}-tab" role="tabpanel"
                        aria-labelledby="{{ $category->slug }}-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                            data-toggle="owl"
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            @foreach ($products as $product)
                                @php
                                    $f = 0;
                                    $avg = 0;
                                    $sum = 0;
                                @endphp
                                @if ($product->cat_id == $category->id)
                                    @php
                                        foreach ($reviews as $review) {
                                            if ($product->id == $review->product_id) {
                                                $sum += $review->rating;
                                                $f++;
                                            }
                                        }
                                        if ($f > 0) {
                                            $avg = $sum / $f;
                                        }

                                    @endphp
                                    <x-web.product :id="$product->id" :slug="$product->slug" :avg="$avg"
                                        :reviews="$f" :name="$product->name" :price="$product->price" :image="$product->image"
                                        :discountprice="$product->discount_price" />
                                @endif
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endforeach
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        {{-- <div class="container">
            <div class="cta cta-border mb-5" style="background-image: url({{ asset('web/assets/images/demos/demo-4/bg-1.jpg')}});">
                <img src="{{ asset('web/assets/images/demos/demo-4/camera.png') }}" alt="camera" class="cta-img">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="cta-content">
                            <div class="cta-text text-right text-white">
                                <p>Shop Today’s Deals <br><strong>Awesome Made Easy. HERO7 Black</strong></p>
                            </div><!-- End .cta-text -->
                            <a href="#" class="btn btn-primary btn-round"><span>Shop Now - $429.99</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .cta-content -->
                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->
            </div><!-- End .cta -->
        </div><!-- End .container --> --}}

        <div class="container">
            <hr class="mb-0">
            <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl"
                data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        }
                    }
                }'>
                <a href="#" class="brand">
                    <img src="{{ asset('web/assets/images/brands/1.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('web/assets/images/brands/2.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('web/assets/images/brands/3.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('web/assets/images/brands/4.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('web/assets/images/brands/5.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('web/assets/images/brands/6.png') }}" alt="Brand Name">
                </a>
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->

        <div class="bg-light pt-5 pb-6">
            <div class="container trending-products">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Trending Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                    <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="trending-top-link" data-toggle="tab"
                                    href="#trending-top-tab" role="tab" aria-controls="trending-top-tab"
                                    aria-selected="true">Top Rated</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-best-link" data-toggle="tab"
                                    href="#trending-best-tab" role="tab" aria-controls="trending-best-tab"
                                    aria-selected="false">Best Selling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-sale-link" data-toggle="tab"
                                    href="#trending-sale-tab" role="tab" aria-controls="trending-sale-tab"
                                    aria-selected="false">On Sale</a>
                            </li>
                        </ul>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="row">
                    <div class="col-xl-5col d-none d-xl-block">
                        <div class="banner">
                            <a href="#">
                                <img src="{{ asset('web/assets/images/demos/demo-4/banners/banner-4.jpg') }}"
                                    alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-xl-5col -->

                    <div class="col-xl-4-5col">
                        <div class="tab-content tab-content-carousel just-action-icons-sm">
                            <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel"
                                aria-labelledby="trending-top-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl"
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach ($toprated as $top)
                                        @php
                                            $f = 0;
                                            $avg = 0;
                                            $sum = 0;
                                            foreach ($reviews as $review) {
                                                if ($top->id == $review->product_id) {
                                                    $sum += $review->rating;
                                                    $f++;
                                                }
                                            }
                                            if ($f > 0) {
                                                $avg = $sum / $f;
                                            }
                                        @endphp
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <span class="product-label label-circle label-top">Top</span>
                                                <a href="{{ url('product/' . $top->slug) }}">
                                                    <img src="{{ asset('storage/images/products/' . $top->image) }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="javascript:void(0);"
                                                        class="btn-product-icon btn-wishlist" title="Add to wishlist"
                                                        onclick="create_wish( {{ $top->id }})"></a>
                                                </div><!-- End .product-action -->
                                                <div class="product-action">
                                                    <input type="hidden" class="qty" name="qty"
                                                        value="1">
                                                    <a href="javascript:void(0);" class="btn-product btn-cart"
                                                        title="Add to cart"
                                                        onclick="create_cart( {{ $top->id }})">Add To Cart</a>
                                                    {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                        title="Quick view"><span>quick view</span></a> --}}
                                                </div>
                                                <!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    {{-- <a href="#">Laptops</a> --}}
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ url('product/' . $top->slug) }}">{{ Str::limit($top->name, 50, '...') }}</a>
                                                </h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    PKR {{ number_format($top->price) }}
                                                    @if ($top->discount_price > 0)
                                                        <sup>PKR
                                                            <s>{{ number_format($top->discount_price + $top->price) }}</s></sup>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val"
                                                            style="width: {{ $avg * 20 }}%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( {{ $f }} Reviews )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel"
                                aria-labelledby="trending-best-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl"
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach ($bestselling as $best)
                                        @php
                                            $f = 0;
                                            $avg = 0;
                                            $sum = 0;
                                            foreach ($reviews as $review) {
                                                if ($best->id == $review->product_id) {
                                                    $sum += $review->rating;
                                                    $f++;
                                                }
                                            }
                                            if ($f > 0) {
                                                $avg = $sum / $f;
                                            }
                                        @endphp
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <span class="product-label label-circle label-new">Best</span>
                                                <a href="{{ url('product/' . $best->slug) }}">
                                                    <img src="{{ asset('storage/images/products/' . $best->image) }}"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="javascript:void(0);"
                                                        class="btn-product-icon btn-wishlist" title="Add to wishlist"
                                                        onclick="create_wish( {{ $best->id }})"></a>
                                                </div><!-- End .product-action -->
                                                <div class="product-action">
                                                    <input type="hidden" class="qty" name="qty"
                                                        value="1">
                                                    <a href="javascript:void(0);" class="btn-product btn-cart"
                                                        title="Add to cart"
                                                        onclick="create_cart( {{ $best->id }})">Add To Cart</a>
                                                    {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                        title="Quick view"><span>quick view</span></a> --}}
                                                </div>
                                                <!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    {{-- <a href="#">Laptops</a> --}}
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ url('product/' . $best->slug) }}">{{ Str::limit($best->name, 50, '...') }}</a>
                                                </h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    PKR {{ number_format($best->price) }}
                                                    @if ($best->discount_price > 0)
                                                        <sup>PKR
                                                            <s>{{ number_format($best->discount_price + $best->price) }}</s></sup>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val"
                                                            style="width: {{ $avg * 20 }}}}%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( {{ $f }} Reviews )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-sale-tab" role="tabpanel"
                                aria-labelledby="trending-sale-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl"
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach ($bestselling as $best)
                                        @php
                                            $f = 0;
                                            $avg = 0;
                                            $sum = 0;
                                            foreach ($reviews as $review) {
                                                if ($best->id == $review->product_id) {
                                                    $sum += $review->rating;
                                                    $f++;
                                                }
                                            }
                                            if ($f > 0) {
                                                $avg = $sum / $f;
                                            }
                                        @endphp
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <span class="product-label label-circle label-sale">Sale</span>
                                                <a href="{{ url('product/' . $best->slug) }}">
                                                    <img src="{{ asset('storage/images/products/' . $best->image) }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="javascript:void(0);"
                                                        class="btn-product-icon btn-wishlist" title="Add to wishlist"
                                                        onclick="create_wish( {{ $best->id }})"></a>
                                                </div><!-- End .product-action -->
                                                <div class="product-action">
                                                    <input type="hidden" class="qty" name="qty"
                                                        value="1">
                                                    <a href="javascript:void(0);" class="btn-product btn-cart"
                                                        title="Add to cart"
                                                        onclick="create_cart( {{ $best->id }})">Add To Cart</a>
                                                    {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                        title="Quick view"><span>quick view</span></a> --}}
                                                </div>
                                                <!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    {{-- <a href="#">Laptops</a> --}}
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ url('product/' . $best->slug) }}">{{ Str::limit($best->name, 50, '...') }}</a>
                                                </h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    PKR {{ number_format($best->price) }}
                                                    @if ($best->discount_price > 0)
                                                        <sup>PKR
                                                            <s>{{ number_format($best->discount_price + $best->price) }}</s></sup>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val"
                                                            style="width: {{ $avg * 20 }}%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( {{ $f }} Reviews )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .col-xl-4-5col -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light pt-5 pb-6 -->

        <div class="mb-5"></div><!-- End .mb-5 -->

        <div class="container for-you">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Recommendation For You</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    {{-- <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a> --}}
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="products">
                <div class="row justify-content-center">
                    @foreach ($recommended as $recommend)
                        @php
                            $f = 0;
                            $avg = 0;
                            $sum = 0;
                            foreach ($reviews as $review) {
                                if ($recommend->id == $review->product_id) {
                                    $sum += $review->rating;
                                    $f++;
                                }
                            }
                            if ($f > 0) {
                                $avg = $sum / $f;
                            }
                        @endphp
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-2">
                                <figure class="product-media">
                                    {{-- <span class="product-label label-circle label-sale">Sale</span> --}}
                                    <a href="{{ url('product/' . $recommend->slug) }}">
                                        <img src="{{ asset('storage/images/products/' . $recommend->image) }}"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist" onclick="create_wish( {{ $recommend->id }})"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <input type="hidden" class="qty" value="1">
                                        <a href="javascript:void(0);" class="btn-product btn-cart"
                                            title="Add to cart"
                                            onclick="create_cart( {{ $recommend->id }})"><span>Add To Cart</span></a>
                                        {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                            title="Quick view"><span>quick view</span></a> --}}
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        {{-- <a href="#">Headphones</a> --}}
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ url('product/' . $recommend->slug) }}">{{ Str::limit($recommend->name, 50, '...') }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">PKR {{ number_format($recommend->price) }}</span>
                                        @if ($recommend->discount_price > 0)
                                            <sup>PKR
                                                <s>{{ number_format($recommend->discount_price + $recommend->price) }}</s></sup>
                                        @endif
                                        {{-- <span class="old-price">Was $349.99</span> --}}
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $avg * 20 }}%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{ $f }} Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    {{-- <div class="product-nav product-nav-dots">
                                        <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav --> --}}
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- End .container -->

        <div class="mb-4"></div><!-- End .mb-4 -->

        <div class="container">
            <hr class="mb-0">
        </div><!-- End .container -->

        <div class="icon-boxes-container bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-red">
                                <i class="icon-rocket"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title primary-text-color">Free Shipping</h3>
                                <!-- End .icon-box-title -->
                                <p>Orders PKR 30,000 or more</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-4">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-red">
                                <i class="icon-rotate-left"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title primary-text-color">Free Returns</h3>
                                <!-- End .icon-box-title -->
                                <p>Within 07 days</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-4">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-red">
                                <i class="icon-life-ring"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title primary-text-color">We Support</h3>
                                <!-- End .icon-box-title -->
                                <p>24/7 amazing services</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->
    </main><!-- End .main -->
    <x-slot name="footer">
        <script></script>
    </x-slot>
</x-web.app-layout>
