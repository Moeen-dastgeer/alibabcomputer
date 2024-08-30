@php

use App\Models\admin\contactus;
$contacts = contactus::all()->first();

@endphp


<!-- footer -->
<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-top-area">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <h3>Main Menu</h3>
                                    <ul class="aa-footer-nav">
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{ url('filter-product') }}">Product Filter</a></li>
                                        <li><a href="{{url('contact')}}">Contact Us</a></li>
                                        
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Categories</h3>
                                        <ul class="aa-footer-nav">
                                            @foreach ($categories as $category)
                                                <li><a href="{{ url('filter-product/' . $category->slug) }}"> {{ $category->name }} </a></li>
                                             @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Useful Links</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="{{url('/cart')}}">Shoping Cart</a></li>
                                            <li><a href="{{url('/checkout')}}">Checkout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Contact Us</h3>
                                        <address>
                                            <p> {{$contacts->address}}</p>
                                            <p><span class="fa fa-phone"></span>{{$contacts->phone}}</p>
                                            <p><span class="fa fa-envelope"></span>{{$contacts->email}}</p>
                                        </address>
                                        <div class="aa-footer-social">
                                            <a href="https://www.facebook.com/alibabacomputerokara/"><span class="fa-brands fa-facebook-f"></span></a>
                                            <a href="#"><span class="fa-brands fa-twitter"></span></a>
                                            <a href="#"><span class="fa-brands fa-google"></span></a>
                                            <a href="#"><span class="fa-brands fa-youtube"></span></a>
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
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-bottom-area">
                        <p>Copyright © 2023 AliBaba Computers All Rights Reserved</p>
                        {{-- <div class="aa-footer-payment">
                            <span class="fa fa-cc-mastercard"></span>
                            <span class="fa fa-cc-visa"></span>
                            <span class="fa fa-paypal"></span>
                            <span class="fa fa-cc-discover"></span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / footer -->