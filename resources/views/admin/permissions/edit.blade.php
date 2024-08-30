<x-admin.app-layout>
   <x-slot name="title">Edit Permission</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Permission</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                            <h4>Edit</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('admin.permissions.index')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <form method="POST" action="{{ route('admin.permissions.update',$permission->id)}}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Permission Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="name" id="name"
                                value="{{ old('name',$permission->name) }}" placeholder="Permission Name ( Required )">
                            <div class="text-danger clean" id="name_error"></div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-save"></i></span> update</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</x-admin.app-layout>