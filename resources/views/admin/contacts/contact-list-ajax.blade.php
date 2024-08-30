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