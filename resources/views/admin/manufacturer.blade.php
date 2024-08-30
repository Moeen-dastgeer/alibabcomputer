<x-admin.app-layout>
    <x-slot name="title">Products Manufacturer</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Products Manufacturer</h1>
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
                <h4>Add New</h4>
            </div>
            <div class="col-md-6 text-right">
                    <a href="{{url('/admin/manufacturer/list')}}" class="btn btn-sm btn-warning">
                      <i class="fa fa-arrow-left"></i> Back
                    </a>
            </div>
          </div>
    </div>
<form action="{{url('admin/manufacturer/create')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
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
        <img src="" class="my-1" alt="" id="show_img" style="width:80px">
      </div>

    <div class="form-group">
        <label>Status</label><br>
        <input type="radio"  id="disable" name="status" value="disable">
        <label class="form-check-label" for="disable">Disable</label>
        <input type="radio"  id="enable" name="status" value="enable" checked>
        <label class="form-check-label" for="enable">Enable</label>
      
    </div>

</div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

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