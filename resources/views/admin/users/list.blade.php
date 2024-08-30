<x-admin.app-layout>
    <x-slot name="title">Team</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Team</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Member</a></li>
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
                                <h5>Member</h5>
                            </div>
                            @can('User create')
                                <div class="col-md-6 text-right">
                                    <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus-square"></i> Member
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-sm table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="30">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    @canany(['User edit', 'User delete'])
                                        <th class="text-center" width="210">Action</th>
                                    @endcanany 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            @foreach($admin->roles as $role)
                                            <span class="badge badge-primary p-1">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>  
                                            @foreach($admin->roles as $role)
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge badge-primary p-1">{{ $permission->name }}</span>
                                                @endforeach
                                            @endforeach
                                        </td>
                                        @canany(['User edit', 'User delete'])
                                        <td>
                                            @can('User edit')
                                                <a href="{{route('admin.users.edit',$admin->id)}}" class="btn btn-sm btn-warning mx-2">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </a>
                                            @endcan

                                            @can('User delete')
                                                <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST" class="form-inline">
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