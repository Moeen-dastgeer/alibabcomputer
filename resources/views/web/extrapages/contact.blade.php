<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Contact Us
    </x-slot>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="container">
            <div class="page-header page-header-big text-center" style="background-image: url('{{asset('web/assets/images/contact-header-bg.jpg')}}')">
                <h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
            </div><!-- End .page-header -->
        </div><!-- End .container -->

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                        <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">
                                    <h3>The Office</h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-map-marker"></i>
                                            9 Asim Plaza,Tehsil Road Aamir Colony,Okara
                                        </li>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:#">+923317407677</a>
                                        </li>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:#">+923217407677</a>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <a href="mailto:#">support@alibabacomputer.com</a>
                                        </li>
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-7 -->

                            <div class="col-sm-5">
                                <div class="contact-info">
                                    <h3>The Office</h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            <span class="text-dark">Monday-Sunday</span> <br>10am - 9pm 
                                        </li>
                                        <li>
                                            <i class="icon-calendar"></i>
                                            <span class="text-dark">Friday</span> <br>Close
                                        </li>
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                    <div class="col-lg-6">
                        <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                        <p class="mb-2">Use the form below to get in touch with the sales team</p>

                        <form action="{{ url('contact') }}" method="post" class="contact-form mb-3" id="contactform">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{old('first_name')}}" placeholder="First Name *">
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{old('last_name')}}" placeholder="Last Name *">
                                </div><!-- End .col-sm-6 -->
                            </div>   
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Email *">
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <input type="tel" name="phone" class="form-control" id="phone" value="{{old('phone')}}" placeholder="Phone">
                                </div><!-- End .col-sm-6 -->
                            </div>      
                            <div class="row">  
                                <div class="col-12">
                                    <input type="text" name="subject" class="form-control" id="subject" value="{{old('subject')}}" placeholder="Subject *">
                                </div><!-- End .col-sm-6 -->
                                <div class="col-12">
                                    <textarea name="message" class="form-control" cols="30" rows="4" id="message" placeholder="Message *">{{old('message')}}</textarea>       
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-2">
                                        <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
                                        <div data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}" class="g-recaptcha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm my-3">
                                <span>SUBMIT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form><!-- End .contact-form -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <hr class="mt-4 mb-5">
                <div class="stores mb-4 mb-lg-5">
                    <h2 class="title text-center mb-3">Our Store</h2><!-- End .title text-center mb-2 -->
                    <div class="row  d-flex justify-content-around">
                        <div class="col-lg-8">
                            <div class="store">
                                <div class="row">
                                    <div class="col-sm-7 col-xl-6">
                                        <div class="store-content">
                                            
                                            <h3 class="store-title">Location</h3><!-- End .store-title -->
                                            <address>9 Asim Plaza,Tehsil Road Aamir Colony,Okara</address>
                                            <div><a href="tel:#">+923217407677</a></div>

                                            <h4 class="store-subtitle">Store Hours:</h4><!-- End .store-subtitle -->
                                            <div>Monday - Sunday 10am to 9pm</div>
                                            <div>Friday Close</div>
                                            {{-- <a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a> --}}
                                        </div><!-- End .store-content -->
                                    </div><!-- End .col-xl-6 -->
                                    <div class="col-sm-5 col-xl-6">
                                        <figure class="store-media mb-2 mb-lg-0">
                                            <img src="{{asset('web/assets/images/stores/img-1.jpg')}}" alt="image">
                                        </figure><!-- End .store-media -->
                                    </div><!-- End .col-xl-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .store -->
                        </div><!-- End .col-lg-6 -->

                        {{-- <div class="col-lg-6">
                            <div class="store">
                                <div class="row">
                                    <div class="col-sm-5 col-xl-6">
                                        <figure class="store-media mb-2 mb-lg-0">
                                            <img src="assets/images/stores/img-2.jpg" alt="image">
                                        </figure><!-- End .store-media -->
                                    </div><!-- End .col-xl-6 -->

                                    <div class="col-sm-7 col-xl-6">
                                        <div class="store-content">
                                            <h3 class="store-title">One New York Plaza</h3><!-- End .store-title -->
                                            <address>88 Pine St, New York, NY 10005, USA</address>
                                            <div><a href="tel:#">+1 987-876-6543</a></div>

                                            <h4 class="store-subtitle">Store Hours:</h4><!-- End .store-subtitle -->
                                            <div>Monday - Friday 9am to 8pm</div>
                                            <div>Saturday - 9am to 2pm</div>
                                            <div>Sunday - Closed</div>

                                            <a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .store-content -->
                                    </div><!-- End .col-xl-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .store -->
                        </div><!-- End .col-lg-6 --> --}}
                    </div><!-- End .row -->
                </div><!-- End .stores -->
            </div><!-- End .container -->
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3426.627555900405!2d73.44643287478318!3d30.813077281746583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922a7458b3a7c7d%3A0xc6d97eb6f7d897e5!2sALI%20BABA%20COMPUTER!5e0!3m2!1sen!2s!4v1688807145949!5m2!1sen!2s"
                                        width="100%" height="100%" frameborder="0" style="border:0"
                                        allowfullscreen>
                </iframe>
            </div><!-- End #map -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <x-slot name="footer">    
        <script>
            $(document).ready(function(){
                    $('#contactform').submit(function(e) {
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
