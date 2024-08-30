<x-admin.app-layout>
    <x-slot name="title">Add New Role</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Team</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Role</a></li>
                <li class="breadcrumb-item active">Add New</li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    <x-slot name="footer"></x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Add New</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <form method="POST" action="{{ route('admin.roles.store')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Role Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="name" id="name"
                                value="{{ old('name') }}" placeholder="Role Name ( Required )">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <h3 class="my-4">Permissions</h3>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-3">
                                    <label class="mt-3 text-center">
                                        <input type="checkbox" class="form-checkbox" name="permissions[]" value="{{$permission->id}}">
                                        <span class="ml-2">{{ $permission->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-save"></i></span> Save</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</x-admin.app-layout>