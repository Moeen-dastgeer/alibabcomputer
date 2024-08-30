@php
    
use App\Models\admin\contactus;
$contacts = contactus::all()->first(); 
    $total = 0;
    $count = 0;
    if (session('cart')) {
        foreach (session('cart') as $id => $cart) {
            $total += $cart['price'] * $cart['qty'];
            $count++;
        }
    }
    $url = url()->current();
    
@endphp


<!-- wpf loader Two -->
<div id="wpf-loader-two">
    <div class="wpf-loader-two-inner">
        <span>Loading</span>
    </div>
</div>
<!-- / wpf loader Two -->
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->


<!-- Start header section -->
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">
                            <!-- start language -->
                            <div class="aa-language">
                                
                                <span class="fas fa-envelope"></span> {{$contacts->email}}

                            </div>
                            <!-- / language -->



                            <!-- start cellphone -->
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span>{{$contacts->phone}}</p>
                            </div>
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                @if (Auth::guard('web')->user())
                                    <li><a href="{{ url('/myaccount') }}">{{ Auth::guard('web')->user()->name }}</a>
                                    </li>
                                    <li class="hidden-xs"><a href="{{ url('/cart') }}">My Cart</a></li>
                                    {{-- <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li> --}}
                                    <li>
                                        <a class="nav-link link-dark"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            href="#">
                                            <i class="nav-icon fa fa-sign-out"></i>
                                            Logout

                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">@csrf</form>

                                    </li>

                                    {{-- <li>
                                        <select name="" onchange="themecolour($(this))">
                                            <option value="">Theme Colour</option>
                                            <option value="default">DEFAULT</option>
                                            <option value="bridge">Bridge</option>
                                            <option value="red">RED</option>
                                            <option value="green">GREEN</option>
                                            <option value="purple">PURPLE</option>
                                            <option value="orange">ORANGE</option>
                                            <option value="pink">PINK</option>
                                        </select>
                                        
                                    </li> --}}
                                @else
                                    <li><a href="{{ url('/cart') }}">Cart</a></li>
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('./register') }}">Signup</a></li>
                                    {{-- <li>
                                        <select name="" onchange="themecolour($(this))">
                                            <option value="">Theme Colour</option>
                                            <option value="default">DEFAULT</option>
                                            <option value="bridge">Bridge</option>
                                            <option value="red">RED</option>
                                            <option value="green">GREEN</option>
                                            <option value="purple">PURPLE</option>
                                            <option value="orange">ORANGE</option>
                                            <option value="pink">PINK</option>
                                        </select>
                                        
                                    </li> --}}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            <!-- Text based logo -->
                            <a href="{{ url('/') }}">
                                {{-- <img src="{{asset('web_assets/img/alibabalogo.jpeg')}}" alt="" width="200px"> --}}
                                {{-- <span class="fa fa-desktop"></span> --}}
                                <p>AliBaba<strong>Computer</strong> <span>Your Shopping Partner</span></p>
                            </a>
                            <!-- img based logo -->
                             {{-- <a href="index.html"><img src="{{asset('web_assets/img/alibabalogo.jpeg')}}" alt="logo img"></a>  --}}
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->
                        <div class="aa-cartbox" id="cart">
                            @if($url != "http://127.0.0.1:8000/cart")
                            <a class="aa-cart-link" href="#">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">SHOPPING CART</span>
                                <span class="aa-cart-notify">{{ $count }}</span>
                            </a>
                            <div class="aa-cartbox-summary">
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $cart)
                                        <ul>

                                            <li>
                                                <a class="aa-cartbox-img"><img
                                                        src="{{ asset('storage/images/products/') }}/{{ $cart['image'] }}"
                                                        alt="img"></a>
                                                <div class="aa-cartbox-info">
                                                    <h4>{{ $cart['name'] }}</h4>
                                                    <p>{{ $cart['qty'] }} x {{ number_format($cart['price']) }} =
                                                        {{ number_format($cart['qty'] * $cart['price']) }}</p>
                                                </div>
                                                <span class="fa fa-times aa-remove-product" onclick="deletecart1({{ $id }})"></span>
                                            </li>
                                    @endforeach
                                    <li>
                                        <span class="aa-cartbox-total-title">
                                            Total
                                        </span>
                                        <span class="aa-cartbox-total-price">
                                            {{ number_format($total) }}
                                        </span>
                                    </li>
                                    </ul>
                                    <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('/cart') }}">
                                        View Cart
                                    </a>
                                    <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('/checkout') }}">
                                        Checkout
                                    </a>
                                @endif
                            </div>
                            @endif
                        </div>
                        <!-- / cart box -->
                        @if(($url == "http://127.0.0.1:8000/filter-product"||$url =="http://127.0.0.1:8000/search_product"))    
                        <!-- search box -->
                        <div class="aa-search-box">
                        @else
                        <div class="aa-search-box" style="visibility:hidden;">
                        @endif           
                            <form action="{{url('search_product')}}" method="post">
                                @csrf
                                <input type="text" name="url" value="{{$url}}" hidden>
                                <input type="text" name="search"  placeholder="Search Product">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                            

                        </div>
                        <!-- / search box -->
                        

                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>

<!-- / header section -->
<!-- menu -->
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('filter-product') }}">Products Filter</a>
                            @foreach ($categories as $category)
                        <li><a href="{{ url('filter-product/' . $category->slug) }}"> {{ $category->name }} </a></li>
                        @endforeach
                        <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>
<!-- / menu -->
