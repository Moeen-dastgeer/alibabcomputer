<table id="" class="table table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th width="30">#</th>
            <th>Name</th>
            <th>Status</th>
            <th>Created at</th>
            <th class="text-center" width="250">Action</th>

        </tr>
    </thead>
    <tbody>
        @php 
            $i = 1;
            $c = 0;
        @endphp
        @foreach ($reviews as $review)
            <tr class="text-center">

                <td>{{ $i++ }}</td>
                <td>{{ $review->name}}</td>
                <td>
                    <select name="status" class="form-control" onchange="reviewStatus({{ $review->id }},$(this))">
                        <option value="pending" {{ $review->status == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="complete" {{ $review->status == 'complete' ? 'selected' : '' }}>
                            Complete
                        </option>
                        
                    </select>
                </td>
                <td>{{ $review->created_at }}</td>
                <td>
                    <a href="{{ url('review/view/') }}/{{ $review->id }}"
                        class="btn btn-primary">View</a>
                    <button onclick="deletereview({{$review->id}})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>