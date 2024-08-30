<table class="table table-bordered table-striped">
    <thead>
          <tr align="center">
              <th width="30">#</th>
              <th>Customer Name</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Created at</th>
              <th class="text-center" width="250">Action</th>
               
          </tr>
      </thead>
      <tbody>
        @php  $i=1; 
            //   $c=0;
            $total = 0;
        @endphp
        @foreach ($orders as $order)                
            <tr class="text-center">

                <td>{{$i++}}</td>
                <td>{{$order->fname.' '.$order->lname}}</td>
                <td>
                    
                    
                    @foreach($items as $item)
                    @if($order->id == $item->order_id)
                        @php 
                        $total += ($item->price*$item->qty); 
                        @endphp
                    @endif
                  @endforeach  
                    {{$total}}  
                
                </td>
                <td>
                    <select name="status" class="form-control" onchange="orderStatus({{ $order->id }},$(this))">
                    <option value="pending" {{$order->status == "pending"?"selected": ""}}>Pending</option>
                    <option value="processing" {{$order->status == "processing"?"selected": ""}}>Processing</option>
                    <option value="complete" {{$order->status == "complete"?"selected": ""}}>Complete</option>
                    <option value="cancel" {{$order->status == "cancel"?"selected": ""}}>Cancel</option>
                  </select>
                    <input type="text" id="id" value="{{$order->id}}" hidden>
                </td>
                <td>{{$order->created_at}}</td>
                <td>
                    <a href="{{url('order_view')}}/{{$order->id}}" class="btn btn-primary">View</a>
                </td>
            </tr>
        @endforeach
      </tbody>        
  </table>
  <div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        {{$orders->links()}}
    </div>
    <div class="col-md-6"></div>
  </div>