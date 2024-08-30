<x-admin.app-layout>
    <x-slot name="title">Team</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Team</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Role</a></li>
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
                                <h5>Roles</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                @can('Role create')
                                    <a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Role</a>
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
                                    <th>Permissions</th>
                                    @canany(['Role edit', 'Role delete'])
                                        <th class="text-center" width="210">Action</th>
                                    @endcanany 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                            <span class="badge badge-primary p-1">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        @canany(['Role edit', 'Role delete'])
                                        <td>
                                            @can('Role edit')
                                                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-sm btn-warning mx-2">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                            @endcan

                                            @can('Role delete')
                                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="form-inline">
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