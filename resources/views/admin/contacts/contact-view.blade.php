<x-admin.app-layout>
    
    <x-slot name="title">Contact Details</x-slot>
    <x-slot name="contentHeader">
        <div class="col-md-6">
            <h1 class="m-0">Contact Details</h1>
        </div><!-- /.col -->
        <div class="col-md-6 text-right">
            <a href="{{url('/admin/contact/list')}}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-square"></i> Back
            </a>
    </div><!-- /.col -->
    </x-slot>
    
    <table class="table table-bordered table-striped">
        <thead>
        <tr class="bg-light text-uppercase">
            <th>Name </th>
            <th>{{$contact->firstname.' '.$contact->lastname}}</th>
        </tr>
        
        <tr class="bg-light text-uppercase">
            <th>Phone No </th>
            <th>{{$contact->phonenumber}}</th>
        </tr>
        
        <tr class="bg-light text-uppercase">
            <th>Email </th>
            <th>{{$contact->email}}</th>
        </tr>
        
        <tr class="bg-light text-uppercase">
            <th>subject </th>
            <th>{{$contact->subject}}</th>
        </tr>

        
        <tr class="bg-light text-uppercase">
            <th style="vertical-align: middle">Message</th>
            <th><textarea class="form-control" rows="10" disabled>{{$contact->message}}</textarea></th>
        </tr>
        
        <tr class="bg-light text-uppercase">
            <th>DateTime</th>
            <th>{{$contact->created_at}}</th>
        </tr>
        </thead>
    </table>

    <x-slot name="footer">
    
    
    </x-slot>

</x-admin.app-layout>