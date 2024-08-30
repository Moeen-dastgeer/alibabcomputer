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

      @php  $i=1; @endphp
      @foreach ($category as $cat)
          <tr align="center">
              <td>{{ $i++ }}</td>
              <td>{{ $cat->name }}</td>
              <td><a href="{{ asset('assets/images/category/'.$cat->image) }}" target="_blank"><img src="{{ asset('assets/images/category/'.$cat->image) }}" width="50px"
                      height="50px"></a></td>
              <td style="width:200px">
                     <select name="status" class="form-control" onchange="Status({{ $cat->id }},$(this))">
                          <option value="enable" {{$cat->status == "enable"?"selected": ""}}>Enable</option>
                          <option value="disable" {{$cat->status == "disable"?"selected": ""}}>Disable</option>
                      </select>
               </td>
              <td>
                  <button type="button" onclick="deletecetegory({{ $cat->id }})"
                      class="btn btn-danger btn-sm">Delete</button>
                  <a href="{{ url('/admin/categories/edit/') }}/{{ $cat->id }}"
                      class="btn btn-info btn-sm">Edit</a>
              </td>
          </tr>
      @endforeach

  </tbody>
</table>
<div class="row">
  <div class="col-md-10"></div>
  <div class="col-md-2">
      {{ $category->links() }}
  </div>
  <div class="col-md-6"></div>
</div>