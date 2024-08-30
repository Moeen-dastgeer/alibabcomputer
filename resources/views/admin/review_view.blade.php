<x-admin.app-layout>
    
    <x-slot name="title">Customer Review Details</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Customer Review Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    

    
    <h3 class="text-uppercase">Customer Details</h3>
    <table class="table table-bordered">
       <thead>
            
        <tr class="bg-light">
                <th width="200px">Name</th>
                <td>{{$review->name}}</td>
            </tr>
            
            <tr class="bg-light">
                <th width="200px">Email</th>
                <td>{{$review->email}}</td>
            </tr>
            
            <tr class="bg-light">
                <th width="200px">Rating</th>
                <td>{{$review->rating}} Stars</td>
            </tr>
            
            <tr class="bg-light">
                <th width="200px">Comment</th>
                <td>{{$review->comment}}</td>
            </tr>
            
            <tr class="bg-light">
                <th width="200px">Status</th>
                <td>{{$review->status}}</td>
            </tr>

            <tr class="bg-light">
                <th width="200px">DateTime</th>
                <td>{{$review->created_at}}</td>
            </tr>
       
       </thead>
    </table>

    <x-slot name="footer">
        <script>

        </script>
    </x-slot>

</x-admin.app-layout>