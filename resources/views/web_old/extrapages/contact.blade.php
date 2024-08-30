<x-web.app-layout>
    <x-slot name="header">
        
    </x-slot>
    <x-slot name="title">
        Contact Us
    </x-slot>


    <!-- start contact section -->
    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-top">
                            <h2>We are wating to assist you..</h2>
                        </div>

                        <!-- Contact address -->
                        <div class="aa-contact-address" style="margin-top: 0px;">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="aa-contact-address-left">
                                        <form action="{{ url('contact') }}" method="POST"
                                            class="comments-form contact-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" name="first_name"
                                                            value="{{ old('first_name') }}" id="first_name"
                                                            placeholder="First Name" class="form-control rounded-0">
                                                        @error('first_name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" name="last_name"
                                                            value="{{ old('last_name') }}" id="last_name"
                                                            placeholder="Last Name" class="form-control rounded-0">
                                                        @error('last_name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" name="email" id="email"
                                                            value="{{ old('email') }}" placeholder="Email"
                                                            class="form-control rounded-0">
                                                        @error('email')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" name="phone" id="phone"
                                                            value="{{ old('phone') }}" placeholder="Phone"
                                                            class="form-control rounded-0">
                                                        @error('phone')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="subject">Subject</label>
                                                        <input type="text" name="subject" id="subject"
                                                            value="{{ old('subject') }}" placeholder="Subject"
                                                            class="form-control rounded-0">
                                                        @error('subject')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3" name="message" placeholder="Message" style="width:100%;">
                                                        {{ old('message') }}
                                                         </textarea>
                                                        @error('message')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group mt-2">
                                                    {!! NoCaptcha::renderJs() !!}
                                                    {!! NoCaptcha::display() !!}
                                                    @error('g-recaptcha-response')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>

                                            <button type="submit" class="aa-secondary-btn">Send</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="contact-info">
                                        <h2 style="color: #075ae9;">Contact us</h2>
                                        <p class="mb-5">We're open for any suggestion or just to have a chat</p>
                                        <div class="row contact-box">
                                            <div class="col-md-1">
                                                <span class="fa-solid fa-location-dot faicon"></span>
                                            </div>
                                            <div class="col-md-11">
                                                Address<br>
                                                {{ $contact->address }}
                                            </div>
                                        </div>
                                        <div class="row contact-box">
                                            <div class="col-md-1">
                                                <span class="fa-solid fa-phone faicon"></span>
                                            </div>
                                            <div class="col-md-11 contact-content">
                                                Phone<br>
                                                {{ $contact->phone }}
                                            </div>
                                        </div>
                                        <div class="row contact-box">
                                            <div class="col-md-1">
                                                <span class="fa-solid fa-envelope faicon"></span>
                                            </div>
                                            <div class="col-md-11 contact-content">
                                                Email<br>
                                                {{ $contact->email }}
                                            </div>
                                        </div>
                                   
                                    </div>
                                    
                                </div>
                                <!-- contact map -->
                                <div class="aa-contact-map" style="margin-top: 40px;">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3426.627555900405!2d73.44643287478318!3d30.813077281746583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922a7458b3a7c7d%3A0xc6d97eb6f7d897e5!2sALI%20BABA%20COMPUTER!5e0!3m2!1sen!2s!4v1688807145949!5m2!1sen!2s"
                                        width="100%" height="450" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <x-slot name="footer">


    </x-slot>
</x-web.app-layout>
