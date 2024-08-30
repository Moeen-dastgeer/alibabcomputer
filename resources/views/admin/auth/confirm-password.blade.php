<x-admin.guest-layout>
    <form method="POST" action="{{ route('admin.password.confirm') }}" >
        @csrf
        <x-slot name="desc"> This is a secure area of the application. Please confirm your password before continuing.</x-slot>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>    
        </div>
        @error('password')
            <span class="invalid-feedback is-invalid d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
        <div class="row">
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Confirm</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    @if (Route::has('password.request'))
    <p class="mb-1"><a href="{{ route('admin.password.request') }}">I forgot my password</a></p>
    @endif  
</x-admin.guest-layout>