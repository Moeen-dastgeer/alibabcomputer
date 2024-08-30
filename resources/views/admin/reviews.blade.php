<x-admin.app-layout>

    <x-slot name="title">Customers Reviews</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Customers Reviews</h1>
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
                    <h4>Reviews</h4>
                </div>

            </div>

            <form id="filterorderform">
                <div class="row mb-3">
                    <div class="col-md-6 d-flex">
                        From:<input type="date" name="from" id="from"
                            class="form-control form-control-md filters">
                        &nbsp;&nbsp;To:<input type="date" name="to" id="to" max="{{ date('Y-m-d') }}"
                            value="{{ date('Y-m-d') }}" class="form-control form-control-md filters">
                    </div>
                    <div class="col-md-3 d-flex">
                        <select name="s_status" class="form-control s_status">
                            <option value="">All</option>
                            <option value="pending">Pending</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex">
                        Search:<input type="search" name="search" id="search"
                            class="form-control form-control-md search">
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="reviews">

                <table id="" class="table table-bordered table-striped table-sm">
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
                                <td>{{ $review->name }}</td>
                                <td>
                                    <select name="status" class="form-control"
                                        onchange="reviewStatus({{ $review->id }},$(this))">
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
                                        class="btn btn-primary btn-sm">View</a>
                                    <button onclick="deletereview({{ $review->id }})"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <x-slot name="footer">
        <script>
            function reviewStatus(id, status) {
                var status = status.val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '{{ url('update-review') }}',
                    data: {
                        status: status,
                        _token: _token,
                        id: id

                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            // notification(data.status, data.message);
                            notification(data.status,data.message);
                        }

                    }
                });
            }



            var page_url = "{{ url('/review/filter?') }}";
            // Pagination   
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page_number = $(this).attr('href').split('page=')[1];
                fetch_review("page=" + page_number);
            });

            $(document).on('change', '.filters', function(event) {
                event.preventDefault();
                fetch_review("page=1");
            });

            $(document).on('change', '.s_status', function(event) {
                event.preventDefault();
                fetch_review("page=1");
            });

            $(document).on('keyup', '.search', function(event) {
                event.preventDefault();
                fetch_review("page=1");
            });


            // Products Fetech 
            function fetch_review(url) {
                $.ajax({
                    url: page_url + '' + url,
                    type: "GET",
                    data: $('#filterorderform').serialize(),
                    success: function(data) {
                        $('#reviews').html(data);
                    }
                });
            }

            // Products Delete
            function deletereview(id) {

                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'get',
                    url: '{{ url('review/delete/') }}',
                    data: {
                        _token: _token,
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status,data.message);
                            fetch_review();
                        }
                    }
                });
            }
        </script>
    </x-slot>


</x-admin.app-layout>
