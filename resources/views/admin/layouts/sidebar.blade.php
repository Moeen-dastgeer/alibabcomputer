<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="Admin Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.settings.profile')}}" class="d-block">{{Auth()->user()->name}}</a>
                <a href="#">
                    (@foreach(auth()->user()->roles as $role)
                        {{ $role->name.' ' }} 
                    @endforeach)
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{ Route::is('admin.dashboard')? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                
                
                <li class="nav-item">
                    <a href="{{url('/order/list')}}" class="nav-link {{ Route::is('order.list')? 'active' : '' }}">
                        <i class=" nav-icon fa-solid fa-cart-shopping"></i>
                        <p>Orders</p>
                    </a>
                </li>

                
                
                
                <li class="nav-item">
                    <a href="{{url('/admin/products/list')}}" class="nav-link {{ Route::is('admin.products.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/products-variant-type/list')}}" class="nav-link {{ Route::is('admin.variant.type.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Products Variants Types</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/products-variant/list')}}" class="nav-link {{ Route::is('admin.variant.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Products Variants</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/categories/list')}}" class="nav-link {{ Route::is('admin.categories.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('/admin/manufacturer/list')}}" class="nav-link {{ Route::is('admin.manufacturer.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manufacturer</p>
                    </a>
                </li>
                    
                <li class="nav-item">
                    <a href="{{url('admin/vendor/list')}}" class="nav-link {{ Route::is('admin.vendor.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Vendor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/slider/list')}}" class="nav-link {{ Route::is('admin.slider.list')? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-sliders"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/brand/list')}}" class="nav-link {{ Route::is('admin.brand.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Clients</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('review/list')}}" class="nav-link {{ Route::is('review.list')? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers Reviews</p>
                    </a>
                </li>
                
                @canany(['Contact access','Contact delete'])
                <li class="nav-item">
                    <a href="{{route('admin.contact.list')}}" class="nav-link {{ Route::is('admin.contact.*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-circle-question"></i>
                        <p>Contact us</p>
                    </a>
                </li>
                @endcanany

                <li class="nav-item ">
                    <a href="javascript:void(0);" class="nav-link ">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <p>Website Setting <i class="right fas fa-angle-left"></i></p>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            
                            <a href="{{url('/admin/contact-us')}}" class="nav-link">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <p>Contact Us Setting</p>
                            </a>
                            
                            <a href="{{url('/admin/terms-conditions')}}" class="nav-link">
                                <i class='fas fa-shield-alt'></i>
                                <p>Terms & Conditions</p>
                            </a>
                            
                            <a href="{{url('/admin/privacy-policy')}}" class="nav-link">
                                <i class="fas fa-user-lock" aria-hidden="true"></i>
                                <p>Privacy & Policy</p>
                            </a>

                            
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item {{ Route::is(['admin.settings.*'])? 'menu-is-opening menu-open' : '' }}">
                    <a href="javascript:void(0);" class="nav-link {{ Route::is(['admin.settings.*'])? 'active' : '' }}">
                        <i class=" nav-icon fa-brands fa-product-hunt"></i>
                        <p>Products <i class="right fas fa-angle-left"></i></p>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.settings.profile')}}" class="nav-link {{ Route::is(['admin.settings.profile'])? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Create Product</p>
                            </a>
                            <a href="{{route('admin.settings.changepassword')}}" class="nav-link {{ route::is(['admin.settings.changepassword'])? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                @canany(['User access', 'User edit', 'User create', 'User delete','Permission access','Permission edit', 'Permission create', 'Permission delete','Role access','Role edit', 'Role create',' Role delete'])
                    <li class="nav-item {{ Route::is(['admin.permissions.*','admin.users.*','admin.roles.*'])? 'menu-is-opening menu-open' : '' }}">
                        <a href="javascript:void(0);" class="nav-link {{ Route::is(['admin.permissions.*','admin.users.*','admin.roles.*'])? 'active' : '' }}">
                            <i class="nav-icon fas fa-users-gear"></i>
                            <p>Team Manage <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['User access', 'User edit', 'User create', 'User delete'])
                                <li class="nav-item">
                                    <a href="{{route('admin.users.index')}}" class="nav-link {{ Route::is('admin.users.*')? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Members</p>
                                    </a>
                                </li>
                            @endcanany
                            {{-- @canany(['Permission access','Permission edit', 'Permission create', 'Permission delete']) --}}
                            {{-- <li class="nav-item">
                                    <a href="{{route('admin.permissions.index')}}" class="nav-link {{ Route::is('admin.permissions.*')? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>  --}}
                            {{-- @endcanany --}}
                            
                            @canany(['Role access','Role edit', 'Role create',' Role delete'])
                                <li class="nav-item">
                                    <a href="{{route('admin.roles.index')}}" class="nav-link {{ Route::is('admin.roles.*')? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </li>     
                @endcanany
                <li class="nav-item {{ Route::is(['admin.settings.*'])? 'menu-is-opening menu-open' : '' }}">
                    <a href="javascript:void(0);" class="nav-link {{ Route::is(['admin.settings.*'])? 'active' : '' }}">
                        <i class=" nav-icon fa fa-user-gear"></i>
                        <p>User Settings <i class="right fas fa-angle-left"></i></p>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.settings.profile')}}" class="nav-link {{ Route::is(['admin.settings.profile'])? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                            <a href="{{route('admin.settings.changepassword')}}" class="nav-link {{ route::is(['admin.settings.changepassword'])? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">@csrf</form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>