<x-web.app-layout>
    <x-slot name="header">
    
    </x-slot>
    <x-slot name="title">
        Login
    </x-slot>
                    
               <!-- Cart view section -->
 <section id="aa-myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="aa-myaccount-area">         
             <div class="row">
               <div class="col-md-6">
                 <div class="aa-myaccount-login">
                 <h4>Login</h4>
                 <form method="POST" action="{{ route('login') }}" class="aa-login-form">
                    @csrf
                   <label for="">Username or Email address<span>*</span></label>
                   <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control rounded-0"
                   placeholder="Email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control rounded-0"
                    placeholder="Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                     <button type="submit" class="aa-browse-btn">Login</button>
                     <p class="aa-lost-password"><a href="{{url('/forgot-password')}}">Lost your password?</a></p>
                   </form>
                 </div>
               </div>
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
    