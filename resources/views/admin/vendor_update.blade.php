<x-admin.app-layout>
    <x-slot name="title">Update Vendor</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Update Vendor</h1>
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
              <a href="{{url('/admin/vendor/list')}}" class="btn btn-sm btn-warning">
                <i class="fa fa-arrow-left"></i> Back
              </a>
            </div>
          </div>
    </div>
<form action="{{url('admin/vendor/edit/')}}/{{$vendor->id}}" method="POST">
  @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{old('name',$vendor->name)}}">
            <span class="text-danger">
              @error('name')
              {{$message}}
              @enderror 
            </span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Phone No</label>
            <input type="text" class="form-control" name="phone" value="{{old('phone',$vendor->phone)}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" name="telephone" value="{{$vendor->telephone}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" value="{{old('address',$vendor->address)}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" value="{{old('city',$vendor->city)}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Person Name</label>
            <input type="text" class="form-control" name="person_name" value="{{$vendor->person_name}}">
          </div>    
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Note</label><br>
            <textarea name="note" class="form-control">{{$vendor->note}}</textarea>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Status</label><br>
        <input type="radio"  id="disable" name="status" value="disable" {{$vendor->status == "disable"?"checked": ""}}>
        <label class="form-check-label" for="disable">Disable</label>
        <input type="radio"  id="enable" name="status" value="enable" {{$vendor->status == "enable"?"checked": ""}}>
        <label class="form-check-label" for="enable">Enable</label>
      </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</div>  

    

<x-slot name="footer">
  <script>
  
  </script>
</x-slot>
</x-admin.app-layout>