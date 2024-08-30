  <table class="table table-sm table-condensed table-striped table-sm">
      <thead>
          <tr align="center">
              <th width="30">#</th>
              <th>Name</th>
              <th>Price</th>
              <th>Image</th>
              <th>Status</th>
              <th class="text-center" width="210">Action</th>

          </tr>
      </thead>
      <tbody>
          @php  $i=1; @endphp
          @foreach ($products as $product)
              <tr align="center">
                  <td>{{ $i++ }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td><img src="{{ asset('storage/images/products/' . $product->image) }}" width="50px" height="50px">
                  </td>
                  <td style="width:200px">
                    <select name="status" class="form-control"
                        onchange="Status({{ $product->id }},$(this))">
                        <option value="enable" {{ $product->status == 'enable' ? 'selected' : '' }}>
                            Enable</option>
                        <option value="disable" {{ $product->status == 'disable' ? 'selected' : '' }}>
                            Disable</option>
                    </select>
                </td>
                  <td>
                      {{-- <a href="{{ url('/admin/products/delete/') }}/{{ $product->id }}" class="btn btn-danger">Delete</a> --}}
                      <button class="btn btn-danger btn-sm" type="button" onclick="deleteproduct({{$product->id}})">Delete</button>
                      <a href="{{ url('/admin/products/edit/') }}/{{ $product->id }}" class="btn btn-info btn-sm">Edit</a>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  <div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        {{ $products->links() }}
    </div>
    <div class="col-md-6"></div>
</div>
