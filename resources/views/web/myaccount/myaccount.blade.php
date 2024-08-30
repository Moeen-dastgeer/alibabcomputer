<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Product Details
    </x-slot>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('web/assets/images/page-header-bg.jpg')}}')">
            <div class="container">
                <h1 class="page-title">My Account<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                           
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link"  href="javascript:void(0);">
                                        <i class="fas fa-user"></i>
                                        {{ Auth::guard('web')->user()->name. ' '. Auth::guard('web')->user()->last_name }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false"> Personal Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false"> Change Password</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#">
                                        
                                        Sign Out
                                    </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
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
                                            @php 
                                                $i = 1;
                                                $c = 0;
                                            @endphp
                                            @forelse ($recentorders as $order)
                                                <tr class="text-center">
                                
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ number_format($order->total[$c++]) }}</td>
                                                    <td>
                                                        {{ $order->status }}
                                                    </td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        <a href="{{ url('/myaccount/view/') }}/{{ $order->id }}" class="btn btn-primary">View</a>
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
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                    <h3>Total Orders</h3>
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
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                    <h3 class="text-uppercase">Personal Details</h3>
                                    <table class="table" cellpadding="20px">
                                      <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <th>{{ Auth::guard('web')->user()->name}}</th>
                                        </tr>
                                    
                                        <tr>
                                            <th>Last Name</th>
                                            <th>{{ Auth::guard('web')->user()->last_name}}</th>
                                        </tr>
                                    
                                        <tr>
                                            <th>Email </th>
                                            <th>{{ Auth::guard('web')->user()->email}}</th>
                                        </tr>
                                    
                                        <tr>
                                            <th>Contact No</th>
                                            <th>{{ Auth::guard('web')->user()->phone}}</th>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">                                  
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
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Display Name *</label>
                                        <input type="text" class="form-control" required>
                                        <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" required>

                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control mb-2">

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <x-slot name="footer">    </x-slot>
</x-web.app-layout>
