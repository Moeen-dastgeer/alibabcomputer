<x-web.app-layout>
    <x-slot name="header">
    
    </x-slot>
    <x-slot name="title">
        Login
    </x-slot>
                    
                <div class="col-md-5 border p-4">
                    <h5 class="text-uppercase text-center">Sign in</h5>
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

                    <form method="POST" action="{{ route('login') }}" class="text-center">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control rounded-0"
                                        placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control rounded-0"
                                        placeholder="Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-primary text-uppercase rounded-0 mt-4">Sign In</button>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="rememberme">
                                        <input type="checkbox" name="rememberme" id="rememberme"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <a href="{{url('/forgot-password')}}" class="text-muted">Lost your password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
        <x-slot name="footer">
            
        </x-slot>
</x-web.app-layout>
    