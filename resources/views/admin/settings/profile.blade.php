<x-admin.app-layout>
    <x-slot name="title">User Profile</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Profile</li>
            </ol>   
        </div><!-- /.col -->
    </x-slot>
    <x-slot name="footer"></x-slot>
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline rounded-0">
                <div class="card-body box-profile">
                    <h3 class="profile-username">{{auth()->user()->name}}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Roles</b> <a class="float-right">
                                @foreach(auth()->user()->roles as $role)
                                    {{ $role->name.' ' }} 
                                @endforeach 
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Permissions</b><br/> 
                            @forelse (auth()->user()->permissions as $permission)
                                {{ $permissions->name.' ' }}
                            @empty
                                @foreach (auth()->user()->roles as $role)
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge badge-primary">{{$permission->name}}</span>
                                    @endforeach
                                @endforeach
                            @endforelse
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card rounded-0">
                <div class="card-header p-2 rounded-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active rounded-0" href="#profile" data-toggle="tab">Profile</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="Profile">
                            <form class="form-horizontal" action="{{route('admin.settings.profile')}}" method="POST">
                                @CSRF
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control rounded-0" value="{{old('name', auth()->user()->name)}}" name="name" id="name" placeholder="Name">
                                         @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control rounded-0" value="{{old('email', auth()->user()->email)}}" name="email" id="email" placeholder="Email">
                                        @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Picutre</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control rounded-0" style="padding-top: 3px;" id="image" name="image">
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger rounded-0">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</x-admin.app-layout>