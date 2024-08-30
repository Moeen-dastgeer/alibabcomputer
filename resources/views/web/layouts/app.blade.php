
<!DOCTYPE html>
<html lang="en">

<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$title != ''? $title.' - ':''}} {{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="computers, laptops, keyboard, alibaba computers, okara, mouse">
    <meta name="description" content="Alibaba Computers shop in okara ">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="manifest" href="{{ asset('web/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{ asset('web/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('web/assets/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('web_assets/fontawesome-free-6.0.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('web/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('web/assets/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('web_assets/css/bootstrap.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('web/assets/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('web/assets/css/skins/skin-demo-4.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('web/assets/css/demos/demo-4.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('web/assets/css/skins/skin-demo-13.css')}}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/demos/demo-13.css')}}">
    <link rel="stylesheet" href="{{ asset('lobibox/dist/css/lobibox.min.css') }}">

</head>

<body>
    <div class="page-wrapper">
        @include('web.layouts.header')
        <div class="row">
            <div class="col-md-12">
                @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible" style="width: 100%;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{!! \Session::get('success') !!}
                    </div>
                @endif    
                @if(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" style="width: 100%;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{!! \Session::get('error') !!} 
                    </div>
                @endif
            </div>
        </div>
        {{ $slot }}
        @include('web.layouts.footer')

        
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="{{url('/search_product')}}" method="post" class="mobile-search">
                @csrf
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="name" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('shop') }}">Shop</a>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ url('shop?category=' . $category->slug) }}"> {{ $category->name }} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ url('shop?category=' . $category->slug) }}"> {{ $category->name }} </a>
                                </li>
                            @endforeach
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form method="POST" action="{{ route('login') }}" class="aa-login-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email-2">Username or email address *</label>
                                            <input name="email" id="email" value="{{ old('email') }}"
                                                class="form-control" required>
                                        </div><!-- End .form-group -->
    
                                        <div class="form-group">
                                            <label for="singin-password-2">Password *</label>
                                            <input type="password" name="password" value="{{ old('email') }}"
                                                class="form-control" id="password" required>
                                        </div><!-- End .form-group -->
    
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
    
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                                <label class="custom-control-label" for="signin-remember-2">Remember
                                                    Me</label>
                                            </div><!-- End .custom-checkbox -->
    
                                            <a href="{{ url('/forgot-password') }}" class="forgot-link">Forgot Your
                                                Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    {{-- <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice --> --}}
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form method="POST" action="{{ route('register') }}" class="aa-login-form" id="registerform">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">First Name<span>*</span></label>
                                            <input type="text" name="name" value="{{ old('name') }}" id="name"
                                                placeholder="Name" class="form-control rounded-0">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name<span>*</span></label>
                                            <input type="text" name="lname" value="{{ old('lname') }}" id="lname"
                                                class="form-control rounded-0" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="register-email-2">Your email address *</label>
                                            <input type="email" value="{{old('email')}}" class="form-control" name="email" id="email">
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="">Phone No<span>*</span></label>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                                placeholder="Phone No" class="form-control rounded-0">
                                        </div><!-- End .form-group -->
    
                                        <div class="form-group">
                                            <label for="">Password<span>*</span></label>
                                            <input type="password" name="password" id="password"
                                                value="{{ old('password') }}" placeholder="Password"
                                                class="form-control rounded-0">
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="">Password<span>*</span></label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" value="{{ old('password_confirmation') }}"
                                                placeholder="Confirm Password" class="form-control rounded-0">
                                        </div><!-- End .form-group -->
                                        <div class="form-group mt-2">
                                            <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
                                            <div data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}" class="g-recaptcha">
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2 my-3">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    {{-- <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice --> --}}
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="{{ asset('web/assets/images/popup/newsletter/logo.png')}}" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{ asset('web/assets/images/popup/newsletter/img-1.jpg')}}" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{ asset('web/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/bootstrap.bundle.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('web/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/superfish.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{ asset('web/assets/js/jquery.elevateZoom.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/jquery.countdown.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('web/assets/js/main.js')}}"></script>
    <script src="{{ asset('web/assets/js/demos/demo-4.js')}}"></script>
    <script src="{{ asset('lobibox/dist/js/lobibox.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('web_assets/js/custom.js') }}"></script>  
    <script>
        
        $(document).ready(function(){
                    $('#registerform').submit(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: $(this).attr('action'),
                            type: "POST",
                            data: new FormData(this),
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                $("p.error").remove();
                                if (data.status == "error") {
                                    jQuery.each(data.errors, function(key, val) {
                                        $("#" + key).after('<p class="small text-danger error">' + val[0] +'</p>');
                                    });
                                }
                                if (data.status == "success") {
                                    alert(data.message);
                                    return false;
                                }
                            },
                            error: function(data) {
                                console.log(data);
                                alert(data.message);
                            },
                        });
                    });  
              });
              
function notification(status, msg) {
	Lobibox.notify(status, {
		pauseDelayOnHover: true,
		size: 'mini',
		icon: 'bx bx-check-circle',
		continueDelayOnInactiveTab: false,
		position: 'bottom right',
		msg: msg
	});
}


        function fetchdata() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_data",
                    success: function(data) {
                        $('#cart').html(data);
                    }
                });
            }

        function wishdata() {
                $.ajax({
                    type: "GET",
                    url: "/wish_data",
                    success: function(data) {
                        $('#wishlist').html(data);
                    }
                });
            }

            function create_wish(pid)
            {
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url:"{{ url('wish') }}",
                        type: "POST",
                        data:{
                                p_id:pid,
                                _token:_token
                                },
                        success: function(data) {
                            if (data.status == 'success') {
                                notification(data.status,data.message);
                                // alert(data.message);
                            }
                            wishdata();
                        }
                    });
            }

            function create_cart(pid,wid=null){
                    var qty = 0;
                    var p = $('#size').val();
                    var m = $('#size').children("option").filter(":selected").text();
                    if(p!=null)
                    {
                        var price = p;
                    }
                    else
                    {
                        var price= null;
                    }
                    if(m!=null)
                    {
                        var memory = m;
                    }
                    else
                    {
                        var memory = null;
                    }
                    if(wid!=null)
                    {
                        qty = $('#qty').val();
                    }
                    else
                    {
                        qty = $('.qty').val();
                    }
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url:"{{ url('cart') }}",
                        type: "POST",
                        data:{
                                p_id:pid,
                                w_id:wid,
                                qty:qty,
                                price1:price,
                                memory:memory,
                                _token:_token
                                },
                        success: function(data) {
                            if (data.status == 'success') {
                                notification(data.status,data.message);
                                // alert(data.message);
                            }
                            fetchdata();
                            wishdata();
                            $('#qty1').val(1);
                        }
                    });
            }

            function deletecart1(id) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '{{ url('/delete_cart') }}',
                    data: {_token: _token, id: id},
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status,data.message); 
                        }
                        fetchdata();
                    }
                });
            }

            function deletewish(id) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '{{ url('/delete_wish') }}',
                    data: {_token: _token, id: id},
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status,data.message);  
                        }
                            wishdata();
                    }
                });
            }
            
    </script>
    
    {{ $footer }}
</body>


<!-- molla/index-4.html  22 Nov 2019 09:54:18 GMT -->
</html>