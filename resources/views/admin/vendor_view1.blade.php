<x-admin.app-layout>
    <x-slot name="title">Products Vendor</x-slot>
    <x-slot name="contentHeader">
        <div class="col-md-6">
            <h1 class="m-0">Products Vendor</h1>
        </div><!-- /.col -->
        
        <div class="col-md-6 text-right">
            <a href="{{url('/admin/vendor/list')}}" class="btn btn-sm btn-warning">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div><!-- /.col -->
    </x-slot>
    
    <div class="card">
      <div class="card-header">
        <div class="row">
        
      </div>
      <!-- /.card-header -->
      <div class="card-body">
       <table class="table table-bordered">
        <tr>
        <th width="200px">Vendor Name :</th><th>{{$vendor->name}}</th>    
        </tr>
        <tr> 
        <th>Person Name : </th><th>{{$vendor->person_name}}</th>     
        </tr>
        <tr>
        <th>Phone No : </th><th>{{$vendor->phone}}</th>     
        </tr>
        <tr>
        <th>Address :  </th><th>{{$vendor->address}}</th>     
        </tr>
        <tr>
        <th>City :  </th><th>{{$vendor->city}}</th>     
        </tr>
       </table>
       
        
    </div>
      <!-- /.card-body -->
  </div>
</div>

<x-slot name="footer">
    <script>
    
    </script>
  </x-slot>
</x-admin.app-layout>