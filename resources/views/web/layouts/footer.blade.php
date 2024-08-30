<footer class="footer footer-2">
    <div class="footer-middle border-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-5">
                    <div class="widget widget-about">
                        <img src="{{ asset('web/assets/images/demos/demo-4/logo.png') }}" class="footer-logo" alt="Footer Logo" width="70%">
                        <p>Welcome to Ali Baba Computer shop, your ultimate destination for top-tier laptops, PCs, and accessories. Explore our curated collection for the latest in cutting-edge technology, all at competitive prices. Upgrade your setup with ease and convenience at Ali Baba Computer shop today! </p>
                        {{-- <div class="widget-about-info"> --}}
                            {{-- <div class="row"> --}}
                                <div class="social-icons social-icons-color">
                                    <span class="social-label">Social Media</span>
                                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            {{-- </div><!-- End .row --> --}}
                        {{-- </div><!-- End .widget-about-info --> --}}
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-12 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{ url('shop') }}">Shop</a></li>
                            <li><a href="{{url('contact')}}">Contact Us</a></li>
                            <li><a href="{{url('login')}}">Sign In</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-3 -->

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            @foreach ($categories as $category)
                                <li><a href="{{ url('shop/' . $category->slug) }}"> {{ $category->name }} </a></li>
                            @endforeach
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-4 col-lg-3 -->

                <div class="col-sm-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Contact</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>              
                                <a href="#">{{$contact->address}}</a>
                                </li>
                                <li>
                                    <span class="fa fa-phone"></span>
                                    <a href="#">{{$contact->phone}}</a>
                                </li>
                                <li>
                                    <span class="fa fa-phone"></span>
                                    <a href="#">{{$contact->phone1}}</a>
                                </li>
                                <li>
                                    <span class="fa fa-envelope"></span>
                                    <a href="#">{{$contact->email}}</a>
                                </li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-64 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © {{date('Y')}} AliBaba Computers. All Rights Reserved.</p><!-- End .footer-copyright -->
            {{-- <ul class="footer-menu">
                <li><a href="#">Terms Of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul><!-- End .footer-menu --> --}}
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->