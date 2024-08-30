<x-admin.app-layout>
    <x-slot name="title">Product Variant Update</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Product Variant Update</h1>
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
              <a href="{{ url('/admin/products-variant-type/list') }}" class="btn btn-sm btn-warning">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            </div>
          </div>
    </div>
<form action="{{url('admin/products-variant-type/update')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <input type="hidden" name="id" value="{{$variant->id}}">
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name',$variant->name)}}">
        <span class="text-danger">
          @error('name')
          {{$message}}
          @enderror 
        </span>
      </div>
    <div class="form-group">
      <input type="radio"  id="disable" name="status" value="disable" {{$variant->status == "disable"?"checked": ""}}>
      <label class="form-check-label" for="disable">Disable</label>
      <input type="radio"  id="enable" name="status" value="enable" {{$variant->status == "enable"?"checked": ""}}>
      <label class="form-check-label" for="enable">Enable</label>
    </div>
</div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>

  <x-slot name="footer">
    <script>
     
    </script>
</x-slot>

</x-admin.app-layout>