<x-web.app-layout>
    <x-slot name="header">
    
    </x-slot>
    <x-slot name="title">
        My Account
    </x-slot>


<main class="" style="background:  #FAF9F6;">
    <div class="container" >
        <div class="row">
            <div class="col-md-3 col-sm-3" style="background:#FFFFFF; margin-top:30px; margin-bottom:30px;" >
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 100%; height:100%; margin-top:20px;">
                    <a href="/" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <i class="fas fa-user"></i>
                        <span class="fs-4">{{ Auth::guard('web')->user()->name. ' '. Auth::guard('web')->user()->last_name }}</span>
                    </a>
                    <hr>
                    <ul class="nav flex-column mb-auto" style="margin-top: 10px; margin-bottom:40px; padding-top:10px;">
                        
                        <li>
                            <a href="{{url('/myaccount')}}" class="nav-link link-dark">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                    
                        
                        <li> 
                            <a href="{{url('/myaccount/orders')}}" class="nav-link link-dark">
                                <i class="nav-icon fas fa-key"></i>
                                Orders
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/myaccount/profile')}}" class="nav-link link-dark">
                                <i class="nav-icon fas fa-user"></i>
                                
                                Personal Details
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/myaccount/change-password')}}" class="nav-link link-dark">
                                <i class="fa-solid fa-key"></i>
                                
                                Change Password
                            </a>
                        </li>

                        <li>

                            <a class="nav-link link-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#" >
                                <i class="nav-icon fas fa-user"></i>
                                Logout
                                
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">@csrf</form>       
                                                             
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
            <div class="col-md-8 col-sm-8" style="background:white; margin-top:30px; margin-bottom-30px; margin-left:20px;">
                {{$slot}}
            </div>
        </div>
    </div>
</main>

<x-slot name="footer">
            

</x-slot>
</x-web.app-layout>


