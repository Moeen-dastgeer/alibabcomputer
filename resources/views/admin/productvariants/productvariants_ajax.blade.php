<table id="" class="table table-bordered table-striped table-sm">
    <thead>
        <tr align="center">
            <th width="30">#</th>
            <th>Variant Type</th>
            <th>Name</th>
            <th class="text-center" width="210">Action</th>

        </tr>
    </thead>
    <tbody>

        @php  $i=1; @endphp
        @foreach ($variants as $variant)
            <tr align="center">
                <td>{{ $i++ }}</td>
                <td>
                    @foreach ($variants_type as $item)
                        {{ $variant->variant_type_id==$item->id?$item->name:'' }}
                    @endforeach
                    </td>
                <td>{{ $variant->variant_name }}</td>
                <td>
                    <button type="button" onclick="deletevariant({{ $variant->id }})"
                        class="btn btn-danger btn-sm">Delete</button>
                    <a href="{{ url('/admin/products-variant/edit/') }}/{{ $variant->id }}"
                        class="btn btn-info btn-sm">Edit</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        {{ $variants->links() }}
    </div>
    <div class="col-md-6"></div>
</div>