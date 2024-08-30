<x-admin.app-layout>
    <x-slot name="title">Sub Categories</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Sub Categories</h1>
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
              <h4>Sub Categories</h4>
          </div>
          <div class="col-md-6 text-right">
                  <a href="{{url('/admin/sub-categories/create')}}" class="btn btn-sm btn-primary">
                      <i class="fa fa-plus-square"></i> Add new
                  </a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                  <tr align="center">
                      <th width="30">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th class="text-center" width="210">Action</th>
                       
                  </tr>
              </thead>
              <tbody>
                @foreach($subcat as $sub)
                        <tr align="center">
                            <td>{{$sub->id}}</td>
                            <td>{{$sub->name}}</td>
                            <td><img src="{{asset('assets/images/subcategory')}}/{{$sub->image}}" width="150px" height="70px"></td>
                            <td></td>
                            <td>{{$sub->status}}</td>
                            <td>
                            <a href="{{url('/admin/sub-categories/delete/')}}/{{$sub->id}}" class="btn btn-danger">Delete</a>
                            <a href="{{url('/admin/sub-categories/edit/')}}/{{$sub->id}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                @endforeach    

              </tbody>       
          </table>
      </div>
      <!-- /.card-body -->
  </div>
</div>


</x-admin.app-layout>