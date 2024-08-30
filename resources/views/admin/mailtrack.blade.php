<x-admin.app-layout>
    <x-slot name="title">Email Track</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Email Track</h1>
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
              <h4>Email Track</h4>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table id="example1" class="table table-sm table-condensed table-striped">
              <thead>
                  <tr align="center">
                      <th width="30">#</th>
                      <th>Email Address</th>
                      <th>Status</th>
                      <th>DateTime</th>
                      <th class="text-center" width="210">Action</th>
                       
                  </tr>
              </thead>
              <tbody>
                @php  $i=1; @endphp
                @foreach($mails as $mail)
                        <tr align="center">
                            <td>{{$i++}}</td>
                            <td>{{$mail->email}}</td>
                            <td>{{$mail->status}}</td>
                            <td>{{$mail->created_at}}</td>
                            <td>
                            <a href=""  class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                @endforeach
              </tbody>        
          </table>
      </div>
      <!-- /.card-body -->
  </div>
</div>



</x-admin.app-layout>