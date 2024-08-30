@php
    use App\Models\Admin\status;
    
    $statuses = status::all();
@endphp


<x-admin.app-layout>

    <x-slot name="title">Customers Orders</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Customers Orders</h1>
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
                    <h4>Orders</h4>
                </div>


            </div>
            
            <form id="filterorderform">
                <div class="row mb-3">
                    <div class="col-md-6 d-flex">
                        From:<input type="date" name="from" id="from"
                            class="form-control form-control-md filters">
                        &nbsp;&nbsp;To:<input type="date" name="to" id="to" max="{{ date('Y-m-d') }}"
                            value="{{ date('Y-m-d') }}" class="form-control form-control-md filters">
                    </div>
                    <div class="col-md-3 d-flex">
                        <select name="s_status" class="form-control s_status">
                            <option value="">All</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->name }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex">
                        Search:<input type="search" name="search" id="search"
                            class="form-control form-control-md search">
                    </div>
                </div>
            </form>

        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
            <div id="orders">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th width="30">#</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th class="text-center" width="250">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $i = 1;
                            // $c = 0;
                            $total = 0;

                        @endphp
                        @foreach ($orders as $order)
                            <tr class="text-center">

                                <td>{{ $i++ }}</td>
                                <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                <td>
                                   
                                  @foreach($items as $item)
                                    @if($order->id == $item->order_id)
                                        @php 
                                        $total += ($item->price*$item->qty); 
                                        @endphp
                                    @endif
                                  @endforeach  
                                    {{number_format($total)}}
                                </td>
                                <td>
                                    <select name="status" class="form-control" onchange="orderStatus({{ $order->id }},$(this))">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                            Processing</option>
                                        <option value="complete" {{ $order->status == 'complete' ? 'selected' : '' }}>
                                            Complete</option>
                                        <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>Cancel
                                        </option>
                                    </select>
                                    <input type="text" id="id" value="{{ $order->id }}" hidden>
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ url('order_view') }}/{{ $order->id }}"
                                        class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        {{ $orders->links() }}
                    </div>
                    <div class="col-md-6"></div>
                  </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


<x-slot name="footer">
    <script>
        
        function orderStatus(id,status){
            var status = status.val();
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                    url:'{{route("update_order")}}',
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



    var page_url = "{{ url('/orders-ajax?') }}";
    // Pagination   
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page_number = $(this).attr('href').split('page=')[1];
        fetch_order("page=" + page_number);
    });

    $(document).on('change', '.filters', function(event) {
    event.preventDefault();
    fetch_order("page=1");
    });

    $(document).on('change', '.s_status', function(event) {
    event.preventDefault();
    fetch_order("page=1");
    });

    $(document).on('keyup', '.search', function(event) {
    event.preventDefault();
    fetch_order("page=1");
    });

    function fetch_order(url) {
        $.ajax({
        url: page_url+''+url,
        type: "GET",
        data: $('#filterorderform').serialize(),
        success: function(data) {
            $('#orders').html(data);
            }
        });
    }
    </script>
</x-slot>




</x-admin.app-layout>
