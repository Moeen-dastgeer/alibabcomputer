@php
    use App\Models\Web\order;
    use App\Models\Web\User;
    use App\Models\Admin\status;
    $torder = order::all();
    $tusers = User::all();
    $corder = order::where('status', 'complete')->get();
    $porder = order::where('status', 'pending')->get();
    $total_order = count($torder);
    $complete_order = count($corder);
    $pending_order = count($porder);
    $users = count($tusers);
    $statuses = status::all();
@endphp

<x-admin.app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>

    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $total_order }}</h3>
                    <p>Total Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ship"></i>
                </div>
                <a href="{{ url('/order/list') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $pending_order }}</h3>
                    <p>Pending Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ship"></i>
                </div>
                <a href="{{ url('/order/list?status=pending') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $complete_order }}</h3>
                    <p>Complete Orders</p>
                </div>
                <div class="icon">
                    <!--<i class="ion ion-pie-graph"></i>-->
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="{{ url('/order/list?status=complete') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
                <h4>Today Orders</h4>
            </div>
            
          </div>
          <form id="filterorderform">
            <div class="row mb-3">
              <div class="col-md-6 d-flex">
                From:<input type="date" name="from" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" id="from" class="form-control form-control-sm filters">
                &nbsp;&nbsp;To:<input type="date" name="to" id="to" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" class="form-control form-control-sm filters">
              </div>
              <div class="col-md-3 d-flex">
                <select name="s_status" class="form-control form-control-sm s_status">
                    <option value="">All</option>
                    @foreach($statuses as $status)
                    <option value="{{$status->name}}">{{$status->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-3 d-flex">
                Search:<input type="search" name="search" id="search" class="form-control form-control-sm search">
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
                    @php  $i=1; 
                    $c=0;
              @endphp
              @forelse ($orders as $order)                
                  <tr class="text-center">
      
                      <td>{{$i++}}</td>
                      <td>{{$order->fname.' '.$order->lname}}</td>
                      <td>{{number_format($order->total[$c++])}}</td>
                      <td>
                        <select name="status" class="form-control" onchange="orderStatus({{ $order->id }},$(this))">
                            <option value="pending" {{$order->status == "pending"?"selected": ""}}>Pending</option>
                            <option value="processing" {{$order->status == "processing"?"selected": ""}}>Processing</option>
                            <option value="complete" {{$order->status == "complete"?"selected": ""}}>Complete</option>
                            <option value="cancel" {{$order->status == "cancel"?"selected": ""}}>Cancel</option>
                          </select>
                          <input type="text" id="id" value="{{$order->id}}" hidden>
                      </td>
                      <td>{{$order->created_at}}</td>
                      <td>
                          <a href="{{url('order_view')}}/{{$order->id}}" class="btn btn-primary">View</a>
                          
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
        <!-- /.card-body -->
    </div>
    
    </div>
    <x-slot name="footer">
        <script>
            function orderStatus(id, status) {
                var status = status.val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('update_order') }}',
                    data: {
                        status: status,
                        _token: _token,
                        id: id

                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status, data.message);
                        }

                    }
                });
            }


            $(document).ready(function() {
                $(document).on('change', '.filters', function(event) {
                    event.preventDefault();
                    fetch_order("/orders-ajax");
                });

                $(document).on('change', '.s_status', function(event) {
                    event.preventDefault();
                    fetch_order("/orders-ajax");
                });

                $(document).on('keyup', '.search', function(event) {
                    event.preventDefault();
                    fetch_order("/orders-ajax");
                });
            });

            function fetch_order(url) {
                $.ajax({
                    url: "{{ url('') }}" + url,
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
