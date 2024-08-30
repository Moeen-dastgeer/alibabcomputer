@extends('web.layouts.app')

@section('content')


 <!-- main content -->
 <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5  bg-light border p-4">
                    <h5 class="text-uppercase text-center">Set new password</h5>
                    @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>error
                            @endif
                            
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
    </main>
    <!-- ./main content -->

@endsection