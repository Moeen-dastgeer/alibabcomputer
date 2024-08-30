<x-web.myaccount-layout>
<div class="row justify-content-md-center py-5">
    <div class="col-md-5  bg-light border p-4">
        <h5 class="text-uppercase text-center">Change password</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/myaccount/change-password') }}">
            @CSRF
            <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">

            <div class="form-group my-2">
                <label for="email">Current Password</label>
                <input type="text" name="old_password" value="{{ old('old_password') }}"
                    class="form-control rounded-0">
                @error('old_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="password">New Password</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="form-control rounded-0">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group my-2">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" class="form-control rounded-0">
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary rounded-0">Change Password</button>
            </div>
        </form>
    </div>
</div>
</x-web.myaccount-layout>