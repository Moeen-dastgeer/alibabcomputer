<x-admin.app-layout>
    <x-slot name="title">Products</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Products</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('/admin/products/create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-square"></i> Add new
                    </a>
                </div>
            </div>
            <form action="" method="get" id="filterForm" class="mb-3">
                <div class="row d-flex">
                    <div class="col-md-1">
                        <select name="entries" id="entries" class="form-control filters" style="width: 70px;">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <select name="category" id="category" class="form-control filters">
                            <option value="all">All Categories</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <select name="manufacturer" id="manufacturer" class="form-control filters">
                            <option value="all">All Manufacturers</option>
                            @foreach ($manufacturer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <select name="status" id="status" class="form-control filters">
                            <option value="all" selected>All Status</option>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                        </select>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <input type="search" class="form-control search" name="search" placeholder="search">
                    </div>
                </div>
            </form>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="products">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th width="30">#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-center" width="210">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php  $i=1; @endphp
                            @foreach ($products as $product)
                                <tr align="center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td><a href="{{ asset('storage/images/products/' . $product->image) }}" target="_blank"><img src="{{ asset('storage/images/products/' . $product->image) }}"
                                            width="50px" height="50px"></a></td>
                                    <td style="width:200px">
                                        <select name="status" class="form-control"
                                            onchange="Status({{ $product->id }},$(this))">
                                            <option value="enable" {{ $product->status == 'enable' ? 'selected' : '' }}>
                                                Enable</option>
                                            <option value="disable" {{ $product->status == 'disable' ? 'selected' : '' }}>
                                                Disable</option>
                                        </select>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ url('/admin/products/delete/') }}/{{ $product->id }}" class="btn btn-danger">Delete</a> --}}
                                        <button class="btn btn-danger" type="button"
                                            onclick="deleteproduct({{ $product->id }})">Delete</button>
                                        <a href="{{ url('/admin/products/edit/') }}/{{ $product->id }}"
                                            class="btn btn-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            {{ $products->links() }}
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->


    </div>
    <x-slot name="footer">
        <script>
             function Status(id,status){
                    var status = status.val();
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                            type:'POST',
                            url:'{{route("admin.update_product_status")}}',
                            data:{
                                status:status,
                                _token:_token,
                                id:id

                            },
                            success:function(data){
                                if(data.status == 'success')
                                {
                                    notification(data.status, data.message);
                                }
                                
                            }
                    });
    }   

            var page_url = "{{ url('/admin/products/filter?') }}";
            $(document).ready(function() {
                // Pagination   
                $(document).on('click', '.pagination a', function(event) {
                    event.preventDefault();
                    var page_number = $(this).attr('href').split('page=')[1];
                    fetch_products("page=" + page_number);
                });

                $(document).on('keyup', '.search', function(event) {
                    event.preventDefault();
                    fetch_products("page=1");
                });

                $(document).on('change', '.filters', function(event) {
                    event.preventDefault();
                    fetch_products("page=1");
                });
            });

            // Products Fetech 
            function fetch_products(url) {
                $.ajax({
                    url: page_url + '' + url,
                    type: "GET",
                    data: $('#filterForm').serialize(),
                    success: function(data) {
                        $('#products').html(data);
                    }
                });
            }

            // Products Delete
            function deleteproduct(id) {
                    if (confirm("Are You Sure You Want To Delete") == true) {    
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'get',
                        url: '{{ url('/admin/products/delete/') }}',
                        data: {
                            _token: _token,
                            id: id
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                notification(data.status, data.message);
                            }
                            fetch_products();
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-admin.app-layout>
