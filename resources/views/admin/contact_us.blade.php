<x-admin.app-layout>
    <x-slot name="title">Contact Us Setting</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Contact Us Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
              <h4>Contact Us Details</h4>
          </div>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table  class="table table-bordered">
           <form action="{{url('/admin/contact-us')}}" method="POST">
            @csrf 
            <thead>
           <tr>
            <th width="200px">Email </th>
            <td><input type="text" class="form-control" name="email" value="{{$contacts->email}}" required></td>
          </tr>

           <tr>
            <th>Phone no 1 </th>
            <td><input type="text" class="form-control" name="phone" value="{{$contacts->phone}}" required></td> 
          </tr>

           <tr>
            <th>Phone No 2 </th>
            <td><input type="text" class="form-control" name="phone1" value="{{$contacts->phone1}}" required></td>
          </tr>
                
           <tr>
            <input type="hidden" name="id" value="{{$contacts->id}}">
            <th>Address </th>
            <td><input type="text" class="form-control" name="address" value="{{$contacts->address}}" required></td>
          </tr>

           <tr>
           <td colspan="2"><button type="submit" class="btn btn-primary">Update</button></td>    
           </tr>
        </thead>
            
           </form>
          </table>
      </div>
      <!-- /.card-body -->
  </div>
</div>



<x-slot name="footer">
    
    
</x-slot>
</x-admin.app-layout>