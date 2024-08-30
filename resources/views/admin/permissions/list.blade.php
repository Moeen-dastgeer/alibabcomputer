<x-admin.app-layout>
    <x-slot name="title">Permissions</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Permission</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    <x-slot name="footer"></x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(!empty(session('message')))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>{{session('message')}}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Permissions</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                @can('Permission create')
                                    <a href="{{route('admin.permissions.create')}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus-square"></i> Permission</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-sm table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="30">#</th>
                                    <th>Name</th>
                                    @canany(['Permission edit', 'Permission delete'])
                                        <th class="text-center" width="210">Action</th>
                                    @endcanany 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        @canany(['Permission edit', 'Permission delete'])
                                        <td>
                                            @can('Permission edit')
                                                 <a href="{{route('admin.permissions.edit',$permission->id)}}" class="btn btn-sm btn-warning mx-2">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </a>
                                            @endcan
                                            
                                            @can('Permission delete')
                                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="form-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger mx-2"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                         @endcanany
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">
                                            Not Found!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <script>
            $(function () {
                $('.select2').select2();
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": true, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    </x-slot>
</x-admin.app-layout>