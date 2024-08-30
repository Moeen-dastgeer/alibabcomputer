<x-admin.app-layout>
    <x-slot name="title">Products Vendor</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Products Vendor</h1>
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
              <h4>Vendor</h4>
          </div>
          <div class="col-md-6 text-right">
                  <a href="{{url('/admin/vendor/create')}}" class="btn btn-sm btn-primary">
                      <i class="fa fa-plus-square"></i> Add new
                  </a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                  <tr>
                      <th width="30">#</th>
                      <th>Vendor Name</th>
                      <th>Phone</th>
                      <th class="text-center" width="210">Action</th>
                       
                  </tr>
              </thead>
              <tbody>

                @php  $i=1; @endphp
        @foreach($vendors as $vendor)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$vendor->name}}</td>
            <td>{{$vendor->phone}}</td>
            <td>
            <a href="{{url('/admin/vendor/view/')}}/{{$vendor->id}}" class="btn btn-danger btn-sm">view</a>
            <a href="{{url('/admin/vendor/delete/')}}/{{$vendor->id}}" class="btn btn-danger btn-sm">Delete</a>
            {{-- <button class=" delete_vendor btn btn-danger" value="{{$vendor->id}}">Delete1</button> --}}
            <a href="{{url('/admin/vendor/edit/')}}/{{$vendor->id}}" class="btn btn-info btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach


              <tbody>
                    
              </tbody>        
          </table>
      </div>
      <!-- /.card-body -->
  </div>
</div>
    <x-slot name="footer">
        <script>
        
        </script>
    </x-slot>

</x-admin.app-layout>