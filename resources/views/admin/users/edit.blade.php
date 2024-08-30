<x-admin.app-layout>
    <x-slot name="title">Team</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Team</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Team Member</a></li>
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
                            <a href="{{route('admin.users.index')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <form method="POST" action="{{ route('admin.users.update', $user->id)}}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="name" id="name"
                                value="{{ old('name', $user->name) }}" placeholder="Name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email"
                                value="{{ old('email', $user->email) }}" placeholder="Email">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control form-control-sm" id="password" type="password" name="password"
                                value="{{ old('password') }}" placeholder="Password">
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input class="form-control form-control-sm" id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter password" value="{{ old('name') }}" >
                            @error('password_confirmation')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <h3 class="my-3">Roles</h3>
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-3">
                                    <label class="mt-3 text-center">
                                        <input type="checkbox" class="form-checkbox" name="roles[]" value="{{$role->id}}"
                                  @if(count($user->roles->where('id',$role->id)))
                                      checked 
                                  @endif>
                                        <span class="ml-2">{{ $role->name }}</span>
                                    </label>
                                </div>
                            @endforeach
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