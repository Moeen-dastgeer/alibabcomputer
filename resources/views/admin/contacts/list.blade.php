<x-admin.app-layout> 
    <x-slot name="title">Contact us</x-slot> 
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">contact us</h1>
        </div><!-- /.col -->
        <!-- /.col -->
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(!empty(session('message')))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>{{session('message')}}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Contacts</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="filterContactForm">
                            <div class="row mb-3">
                              <div class="col-md-6 d-flex">
                                From:<input type="date" name="from" id="from" class="form-control form-control-sm contactfilters">
                                &nbsp;&nbsp;To:<input type="date" name="to" id="to" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" class="form-control form-control-sm contactfilters">
                              </div>
                              <div class="col-md-3 d-flex">
                                
                              </div>
                              <div class="col-md-3 d-flex">
                                Search:<input type="search" name="search" id="search" class="form-control form-control-sm contactsearch">
                              </div>
                            </div>
                        </form>
                        <div id="contacts">
                            <table class="table table-sm table-condensed table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th> 
                                        <th>Name</th> 
                                        <th>Subject</th> 
                                        <th>DateTime</th> 
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @forelse ($contacts as $contact)
                                        <tr class="text-center">
                                            <td>{{$i++}}</td>
                                            <td>{{$contact->firstname.' '.$contact->lastname}}</td>
                                            <td>{{$contact->subject}}</td>
                                            <td>{{$contact->created_at}}</td>
                                            <td>
                                                <a href="{{url('/admin/contact/view')}}/{{$contact->id}}" class="btn btn-primary">View</a>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Not Found!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row mt-3">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 d-flex justify-content-end">
                                {{ $contacts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <script>
            
            $(document).ready(function() {
                // Pagination   
                $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page_number = $(this).attr('href').split('page=')[1];
                fetch_contact("/contact-ajax?page=" + page_number);
                });
                $(document).on('change', '.contactfilters', function(event) {
                event.preventDefault();
                fetch_contact("/contact-ajax?page=1");
                });
                $(document).on('keyup', '.contactsearch', function(event) {
                event.preventDefault();
                fetch_contact("/contact-ajax?page=1");
                });
            });

            function fetch_contact(url) {
                // alert('working');
                $.ajax({
                url: "{{url('/admin/')}}" + url,
                type: "GET",
                data: $('#filterContactForm').serialize(),
                success: function(data) {
                    $('#contacts').html(data);
                }
                });
            }
        </script>
    </x-slot>
</x-admin.app-layout>