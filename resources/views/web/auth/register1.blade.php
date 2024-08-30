<x-web.app-layout>
    <x-slot name="header">
    
    </x-slot>
    <x-slot name="title">
        Register
    </x-slot>

<!-- main content -->
 <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5  bg-light border p-4">
                    <h5 class="text-uppercase text-center">Sign UP</h5>
                    <form method="POST" action="{{ route('register') }}">
                        <div class="row">
                            <div class="col-md-12 mt2">
                            @CSRF
                                <div class="form-group my-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        id="name" placeholder="Name" class="form-control rounded-0">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" value="{{ old('lname') }}" id="lname" class="form-control rounded-0" placeholder="Last Name">

                                    @error('lname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror    
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                            <div class="form-group my-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Email"
                                        class="form-control rounded-0">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                            <div class="form-group my-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        value="{{ old('password') }}" placeholder="Password"
                                        class="form-control rounded-0">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                            <div class="form-group my-2">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        value="{{ old('password_confirmation') }}" placeholder="Confirm Password"
                                        class="form-control rounded-0">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-dark text-uppercase rounded-0 mt-4">Sign up</button>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    If you have already account <a href="./login">click here</a> to sing in
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- ./main content -->
    <x-slot name="footer">
            
    </x-slot>
</x-web.app-layout>
