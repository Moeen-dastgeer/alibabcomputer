<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Reset Password
    </x-slot>

    <!-- Cart view section -->
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="aa-myaccount-area">
                        <div class="aa-myaccount-login">
                            <h4>Reset Password</h4>
                            <form method="POST" action="{{ route('password.store') }}">
                                @CSRF
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="form-group my-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"
                                        value="{{ old('email', $request->email) }}" placeholder="Email"
                                        class="form-control rounded-0">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group my-2">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password"
                                        value="{{ old('password') }}" placeholder="Password"
                                        class="form-control rounded-0">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group my-2">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        value="{{ old('password_confirmation') }}" placeholder="Confirm Password"
                                        class="form-control rounded-0">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary rounded-0">Reset Password</button>
                                </div>
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
