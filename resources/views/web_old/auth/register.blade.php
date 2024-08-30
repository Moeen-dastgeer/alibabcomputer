<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Register
    </x-slot>

    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                                <div class="aa-myaccount-register">
                                    <h4>Register</h4>
                                    <form method="POST" action="{{ route('register') }}" class="aa-login-form">
                                        @csrf
                                        <label for="">First Name<span>*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                                            placeholder="Name" class="form-control rounded-0">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <label for="">Last Name<span>*</span></label>
                                        <input type="text" name="lname" value="{{ old('lname') }}" id="lname"
                                            class="form-control rounded-0" placeholder="Last Name">

                                        @error('lname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <label for="">Email<span>*</span></label>
                                        <input type="text" name="email" id="email" value="{{ old('email') }}"
                                            placeholder="Email" class="form-control rounded-0">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <label for="">Phone No<span>*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                            placeholder="Phone No" class="form-control rounded-0">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <label for="">Password<span>*</span></label>
                                        <input type="password" name="password" id="password"
                                            value="{{ old('password') }}" placeholder="Password"
                                            class="form-control rounded-0">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <label for="">Password<span>*</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            value="{{ old('password_confirmation') }}" placeholder="Confirm Password"
                                            class="form-control rounded-0">
                                        @error('password_confirmation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <button type="submit" class="aa-browse-btn">Register</button>
                                    </form>
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
