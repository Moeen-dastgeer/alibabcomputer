<x-admin.app-layout>
    <x-slot name="title">Category Update</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Category Update</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    
<div class="card card-white">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4>Update Data</h4>
            </div>
            <div class="col-md-6 text-right">
              <a href="{{ url('/admin/categories/list') }}" class="btn btn-sm btn-warning">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            </div>
          </div>
    </div>
<form action="{{url('admin/categories/update')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <input type="hidden" name="id" value="{{$category->id}}">
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name',$category->name)}}">
        <span class="text-danger">
          @error('name')
          {{$message}}
          @enderror 
        </span>
      </div>
        <div class="form-group">
        <label>Picture<span class="text-danger">*</span></label>
            <input type="file" class="form-control p-1" id="file" name="image">
            <span class="text-danger">
              @error('image')
              {{$message}}
              @enderror 
            </span>
            <img src="{{asset('assets/images/category')}}/{{$category->image}}" class="my-1" id="show_img" width="80px" height="80px">
    </div>
    <div class="form-group">
      <input type="radio"  id="disable" name="status" value="disable" {{$category->status == "disable"?"checked": ""}}>
      <label class="form-check-label" for="disable">Disable</label>
      <input type="radio"  id="enable" name="status" value="enable" {{$category->status == "enable"?"checked": ""}}>
      <label class="form-check-label" for="enable">Enable</label>
  </div>
  <div class="form-check col-md-6 col-sm-12">
    <input type="checkbox" name="show_on_nav" class="form-check-input" value="1" id="show" {{$category->show_on_nav == 1?"checked": ""}}>
    <label class="form-check-label" for="show">Show on Navbar</label>
  </div>
</div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>

  <x-slot name="footer">
    <script>
        $(document).ready(function() {
               $('#file').on('change', function() {
                 var src = URL.createObjectURL(this.files[0]);
                   document.getElementById('show_img').src = src;
              });
          });
    </script>
</x-slot>

</x-admin.app-layout>