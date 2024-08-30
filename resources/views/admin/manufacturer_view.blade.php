<x-admin.app-layout>
    <x-slot name="title">Products Manufacturer</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Products Manufacturer</h1>
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
              <h4>Manufacturer</h4>
          </div>
          <div class="col-md-6 text-right">
                  <a href="{{url('/admin/manufacturer/create')}}" class="btn btn-sm btn-primary">
                      <i class="fa fa-plus-square"></i> Add new
                  </a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
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
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                        
                    </select>
                </div>
                <div class="col-md-3 d-flex">
                    Search:<input type="search" name="search" id="search"
                        class="form-control form-control-md search">
                </div>
            </div>
        </form>
        <div id="manufacturer">
        <table id="" class="table table-bordered table-striped table-sm">
              <thead>
                  <tr align="center">
                      <th width="30">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th class="text-center" width="210">Action</th>
                       
                  </tr>
              </thead>
              <tbody>
                @php $i=1; @endphp
                @foreach($manufacturer as $manufac)
                        <tr align="center">
                            <td>{{$i++}}</td>
                            <td>{{$manufac->name}}</td>
                            <td><a href="{{asset('assets/images/manufacturer')}}/{{$manufac->image}}" target="_blank"><img src="{{asset('assets/images/manufacturer')}}/{{$manufac->image}}" width="50px" height="50px"></a></td>
                            <td style="width:200px">
                                <select name="status" class="form-control" onchange="Status({{ $manufac->id }},$(this))">
                                     <option value="enable" {{$manufac->status == "enable"?"selected": ""}}>Enable</option>
                                     <option value="disable" {{$manufac->status == "disable"?"selected": ""}}>Disable</option>
                                 </select>
                            </td>
                            <td>
                            <button  type="button" onclick="deletemanufacturer({{$manufac->id}})" class="btn btn-danger btn-sm">Delete</button>
                            <a href="{{url('admin/manufacturer/edit/')}}/{{$manufac->id}}" class="btn btn-info btn-sm">Edit</a>
                            </td>
                        </tr>
                @endforeach

              </tbody>        
          </table>
          <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                {{ $manufacturer->links() }}
            </div>
            <div class="col-md-6"></div>
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
                            url:'{{route("admin.update_manufacturer_status")}}',
                            data:{
                                status:status,
                                _token:_token,
                                id:id

                            },
                            success:function(data){
                                if(data.status == 'success')
                                {
                                   notification(data.status,data.message);
                                }
                                
                            }
                    });
    }   

    var page_url = "{{ url('/admin/manufacturer-ajax?') }}";
    // Pagination   
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page_number = $(this).attr('href').split('page=')[1];
        fetch_manufacturer("page=" + page_number);
    });

    $(document).on('change', '.filters', function(event) {
    event.preventDefault();
    fetch_manufacturer("page=1");
    });

    $(document).on('change', '.s_status', function(event) {
    event.preventDefault();
    fetch_manufacturer("page=1");
    });

    $(document).on('keyup', '.search', function(event) {
    event.preventDefault();
    fetch_manufacturer("page=1");
    });


    function fetch_manufacturer(url) {
        $.ajax({
        url: page_url+''+url,
        type: "GET",
        data: $('#filterorderform').serialize(),
        success: function(data) {
            $('#manufacturer').html(data);
            }
        });
    }

    function deletemanufacturer(id) {
        if (confirm("Are You Sure You Want To Delete") == true) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'get',
                    url: '{{ url('admin/manufacturer/delete/') }}',
                    data: {_token: _token, id: id},
                    success: function(data) {
                        if (data.status == 'success') {
                        notification(data.status,data.message);  
                        fetch_manufacturer();
                        }
                    }
                });
            }
    }    

    </script>
</x-slot>




</x-admin.app-layout>