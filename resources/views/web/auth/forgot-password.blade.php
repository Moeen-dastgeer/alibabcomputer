<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Forget Password
    </x-slot>

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url('{{ asset('web/assets/images/backgrounds/login-bg.jpg') }}')">
        <div class="container">
            <div class="form-box">
                <h5 class="text-uppercase text-center">Forget Password</h5>
                    <form method="POST" action="{{ route('password.email') }}">
                        @CSRF
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                placeholder="Email" class="form-control rounded-0">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div><!-- End .form-group -->
                        <div class="form-footer">
                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>Email Password Reset Link</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                            {{-- <p class="m-4"><a href="{{ url('/login') }}" class="forgot-link">Create Account</a></p> --}}
                        </div><!-- End .form-footer -->
                    </form>
            </div>
        </div>
    </div>

    <x-slot name="footer">

    </x-slot>
</x-web.app-layout>
