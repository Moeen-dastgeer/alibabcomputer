@extends('web.layouts.app')


@section('content')

 <!-- main content -->
 <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5  bg-light border p-4">
                    <h5 class="text-uppercase text-center">Forget Password</h5>
                    
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
                    <form method="POST" action="{{ route('password.email') }}" >
                                @CSRF
                                <div class="form-group my-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Email"
                                        class="form-control rounded-0">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary rounded-0">Email Password Reset Link</button>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p class="my-3">
                                            <a href="{{ url('register') }}">Create Account?</a>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="my-3">
                                            <a href="{{ url('/login') }}">Login</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </main>
    <!-- ./main content -->


@endsection