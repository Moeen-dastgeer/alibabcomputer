<x-web.myaccount-layout>

<h3>Total Orders</h3>
                
<table class="table table-bordered table-striped">
    <thead>
          <tr class="text-center">
              <th width="30">#</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Created at</th>
              <th class="text-center" width="250">Action</th>
               
          </tr>
      </thead>
      <tbody>
          @php  $i=1; 
          $c=0;
    @endphp
    @forelse ($orders as $order)                
        <tr class="text-center">

            <td>{{$i++}}</td>
            <td>{{number_format($order->total[$c++])}}</td>
            <td>
                {{$order->status}}
            </td>
            <td>{{$order->created_at}}</td>
            <td>
                <a href="{{url('/myaccount/view/')}}/{{$order->id}}" class="btn btn-primary">View</a>
            </td>
        </tr>
      @empty
          <tr>
                <td colspan="6" class="text-center">
                    Not Found!
              </td>
          </tr>
                          
    @endforelse 
      </tbody>        
  </table>
</x-web.myaccount-layout>