<table id="" class="table table-bordered table-striped table-sm">
    <thead>
        <tr align="center">
            <th width="30">#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Status</th>
            <th class="text-center" width="210">Action</th>
             
        </tr>
    </thead>
    <tbody>
      @php $i=1; @endphp
      @foreach($manufacturer as $manufac)
              <tr align="center">
                  <td>{{$i++}}</td>
                  <td>{{$manufac->name}}</td>
                  <td><a href="{{asset('assets/images/manufacturer')}}/{{$manufac->image}}" target="_blank"><img src="{{asset('assets/images/manufacturer')}}/{{$manufac->image}}" width="50px" height="50px"></a></td>
                  <td style="width:200px">
                    <select name="status" class="form-control" onchange="Status({{ $manufac->id }},$(this))">
                         <option value="enable" {{$manufac->status == "enable"?"selected": ""}}>Enable</option>
                         <option value="disable" {{$manufac->status == "disable"?"selected": ""}}>Disable</option>
                     </select>
                </td>
                  <td>
                    <button  type="button" onclick="deletemanufacturer({{$manufac->id}})" class="btn btn-danger btn-sm">Delete</button>
                  <a href="{{url('admin/manufacturer/edit/')}}/{{$manufac->id}}" class="btn btn-info btn-sm">Edit</a>
                  </td>
              </tr>
      @endforeach

    </tbody>        
</table>
<div class="row">
  <div class="col-md-10"></div>
  <div class="col-md-2">
      {{ $manufacturer->links() }}
  </div>
  <div class="col-md-6"></div>
</div>