<x-admin.app-layout>
    <x-slot name="title">Sub Categories</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Sub Categories</h1>
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
                <a href="sub-categories" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-square"></i> Back
                </a>
        </div>
      </div>
    </div>
<form action="{{url('/admin/sub-categories/create')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="card-body">

        
      <div class="form-group">
        <label>Category Name<span class="text-danger">*</span></label><br>
        <select class="form-control" name="subcat">
          <option value="">......Select......</option>
          @foreach ($cat as $item)
           <option value="{{$item->id}}">{{$item->name}}</option>   
          @endforeach
        </select>
      </div>
      

      <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
      </div>
      
      <div class="form-group">
        <label>Picture<span class="text-danger">*</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
        </div>
      </div>

    <div class="form-group">
        <label>Status</label><br>
        <input type="radio"  id="disable" name="status" value="disable">
        <label class="form-check-label" for="disable">Disable</label>
        <input type="radio"  id="enable" name="status" value="enable">
        <label class="form-check-label" for="enable">Enable</label>
      
    </div>

</div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

</x-admin.app-layout>