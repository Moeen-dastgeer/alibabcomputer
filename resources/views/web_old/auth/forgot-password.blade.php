<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Forget Password
    </x-slot>



    
    <!-- Cart view section -->
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="aa-myaccount-area">
                        <div class="aa-myaccount-login">
                            <h4>Reset Password</h4>
                            <form method="POST" action="{{ route('password.email') }}" class="aa-login-form">
                                @csrf
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="{{ old('email') }}"
                                    placeholder="Email" class="form-control rounded-0">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="aa-browse-btn">Email Password Reset Link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->

    <x-slot name="footer">

    </x-slot>
</x-web.app-layout>
