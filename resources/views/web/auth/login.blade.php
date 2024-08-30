<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Login
    </x-slot>

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url('{{ asset('web/assets/images/backgrounds/login-bg.jpg') }}')">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                    aria-controls="signin-2" aria-selected="false">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2"
                                    role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form method="POST" action="{{ route('login') }}" class="aa-login-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email-2">Username or email address *</label>
                                        <input name="email" id="email" value="{{ old('email') }}"
                                            class="form-control">
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">Password *</label>
                                        <input type="password" name="password" value="{{ old('email') }}"
                                            class="form-control" id="password">
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
                            <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                                aria-labelledby="register-tab-2">
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
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->

    <x-slot name="footer">
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
        </script>
    </x-slot>
</x-web.app-layout>
