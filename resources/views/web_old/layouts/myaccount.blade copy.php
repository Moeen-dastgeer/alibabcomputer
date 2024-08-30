<x-web.app-layout>
    <x-slot name="header">
    
    </x-slot>
    <x-slot name="title">
        My Account
    </x-slot>


<main class="">
    <div class="container" >
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 100%; height:100%;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                       
                        <span class="fs-4">{{ Auth::guard('web')->user()->name. ' '. Auth::guard('web')->user()->last_name }}</span>
                    </a>
                    <hr>
                    <ul class="nav flex-column mb-auto">
                        
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
            <div class="col-md-9 col-sm-9">
                <h3>Recent Orders</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                          <tr class="text-center">
                              <th width="30">#</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Created at</th>
                              <th class="text-center" width="250">Action</th>
                               
                          </tr>
                      </thead>
                      <tbody>
                          @php  $i=1; 
                          $c=0;
                    @endphp
                    @forelse ($orders as $order)                
                        <tr class="text-center">
            
                            <td>{{$i++}}</td>
                            <td>{{$order->fname.' '.$order->lname}}</td>
                            <td>{{number_format($order->total[$c++])}}</td>
                            <td>
                                {{$order->status}}
                            </td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                <a href="{{url('/myaccount/view/')}}/{{$order->id}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                      @empty
                          <tr>
                                <td colspan="6" class="text-center">
                                    Not Found!
                              </td>
                          </tr>
                                          
                    @endforelse 
                      </tbody>        
                  </table>

            </div>
        </div>
    </div>
</main>

<x-slot name="footer">
            

</x-slot>
</x-web.app-layout>


