@php

    use App\Models\Admin\contactus;
    $contacts = contactus::all()->first();
    $total = 0;
    $count = 0;
    if (session('cart')) {
        foreach (session('cart') as $id => $cart) {
            $total += $cart['price'] * $cart['qty'];
            $count++;
        }
    }
    $total1 = 0;
    $count1 = 0;
    if (session('wish')) {
        foreach (session('wish') as $id => $wish) {
            $total1 += $wish['price'];
            $count1++;
        }
    }

    $url = url()->current();

@endphp


<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i> {{$contact->phone}}</a>         
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                        @if (Auth::guard('web')->user())
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('/myaccount')}}">
                                My Account
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link active" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#">
                                <i class="nav-icon fa fa-sign-out"></i>
                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            </li> --}}
                        @else
                            <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                        @endif
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('web/assets/images/demos/demo-4/logo.png') }}" alt="Logo" class="img-fluid">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    {{-- <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a> --}}
                    <form action="{{url('/search_product')}}" method="post">
                        @csrf
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="search" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="name" value="{{ @$search }}" id="search"
                                placeholder="Search product ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                    <div class="dropdown cart-dropdown" id="wishlist">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-display="static">
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                <span class="cart-count">{{ $count1 }}</span>
                            </div>
                            <p>Wish List</p>
                        </a>
                        @if ($count1 > 0)
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                    @foreach (session('wish') as $id => $wish)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a  href="{{ url('product/' . $wish['slug']) }}"> {{ Str::limit($wish['name'], 20, '...') }}</a>
                                                </h4>
                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">Price : {{ $wish['price'] }}</span>
                                                    <input type="hidden" id="qty" name="qty" value="1"><br>
                                                <a href="javascript:void(0);" class="" onclick="create_cart( {{ $id }},{{ $id }})">Add to Cart</a>
                                                </span>
                                            </div><!-- End .product-cart-details -->
                                            <figure class="product-image-container">
                                                <a  href="{{ url('product/' . $wish['slug']) }}">
                                                    <img src="{{ asset('storage/images/products/') }}/{{ $wish['image'] }}"
                                                        alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i
                                                    class="icon-close" onclick="deletewish({{ $id }})"></i></a>
                                                    
                                        </div><!-- End .product -->
                                    @endforeach
                                
                            </div><!-- End .cart-product -->
    
                            <div class="dropdown-cart-total">
                                <span>Total</span>
    
                                <span class="cart-total-price">{{ number_format($total1) }}</span>
                            </div><!-- End .dropdown-cart-total -->
                            
                            <div class="dropdown-cart-action">
                                {{-- <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                                <a href="{{url('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                        class="icon-long-arrow-right"></i></a> --}}
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                        @endif
                    </div><!-- End .cart-dropdown -->

                <div class="dropdown cart-dropdown" id="cart">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ $count }}</span>
                        </div>
                        <p>Cart</p>
                    </a>
                    @if ($count > 0)
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                                @foreach (session('cart') as $id => $cart)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a  href="{{ url('product/' . $cart['slug']) }}">{{ Str::limit($cart['name'], 20, '...') }}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $cart['qty'] }}</span>
                                                x {{ number_format($cart['price']) }} =
                                                {{ number_format($cart['qty'] * $cart['price']) }}
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a  href="{{ url('product/' . $cart['slug']) }}">
                                                <img src="{{ asset('storage/images/products/') }}/{{ $cart['image'] }}"
                                                    alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product" onclick="deletecart1({{ $id }})"><i
                                                class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                @endforeach
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">{{ number_format($total) }}</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                            <a href="{{url('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                    @endif
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="true">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true" data-display="static" title="Browse Categories">
                        Browse Categories <i class="icon-angle-down"></i>
                    </a>

                    @if(Route::current()->getName() == 'home')
                        <div class="dropdown-menu show">    
                    @else
                        <div class="dropdown-menu">
                    @endif
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">

                                @foreach ($categories as $category)
                                    <li class="item-lead"><a href="{{ url('shop?category=' . $category->slug) }}"> {{ $category->name }} </a></li>
                                @endforeach
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                       <li>
                                    <a href="{{ url('shop') }}" class="sf-with-ul">Shop</a>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ url('shop?category=' . $category->slug) }}"> {{ $category->name }} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                        </li>
                        @foreach ($categories1 as $category1)
                            <li>
                                <a href="{{ url('shop?category=' . $category1->slug) }}"> {{ $category1->name }} </a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ url('contact') }}">Contact us</a>
                        </li>
                        {{-- <li>
                            <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>
                        </li> --}}
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            {{-- <div class="header-right"> --}}
                {{-- <i class="la la-lightbulb-o"></i> --}}
                {{-- <p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p> --}}
            {{-- </div> --}}
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
