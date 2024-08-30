<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Product Details
    </x-slot>
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-uppercase">Customer Details</h3>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <td>{{ $order->fname . ' ' . $order->lname }}</td>
                    </tr>
                    <tr class="text-center">
                        <th>Phone No</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr class="text-center">
                        <th>Email</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr class="text-center">
                        <th>Address</th>
                        <td>{{ $order->address1 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th>City</th>
                        <td>{{ $order->city }}</td>
                    </tr>
                    <tr class="text-center">
                        <th>Postal Code</th>
                        <td>{{ $order->post_code }}</td>
                    </tr>
    
                </thead>
            </table>
        </div>
    
        <div class="col-md-12 col-sm-12">
            <h3 class="text-uppercase">Products Order Details</h3>
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-light text-center">
                        <th>Order Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
    
                    <tr class="text-center">
    
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
    
    
                    </tr>
                </tbody>
    
            </table>
        </div>
    
        <div class="col-md-12 col-sm-12">
            <h3 class="text-uppercase">Products Details</h3>
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-light text-center">
                        <th width="70px">Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Memory</th>
                        <th>QTY</th>
                        <th width="140px">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($items as $item)
                        <tr class="text-center">
                            <td><img src="{{ asset('storage/images/products/') }}/{{ $item->image }}" width="50px"></td>
                            <td>{{ $item->name }}</td>
                            <td>Rs. {{ number_format($item->price) }}</td>
                            <td>{{ $item->memory }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rs. {{ number_format($item->price * $item->qty) }}</td>
                            @php
                                $total = $total + $item->price * $item->qty;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
    
            </table>
            <div class="row my-5">
                <div class="col"></div>
                <div class="col">
                    <h5 class="text-uppercase pb-2 border-bottom">SHOPPING CART TOTAL</h5>
                    <div class="row pb-3">
                        <div class="col"><b>Total</b></div>
                        <div class="col d-flex justify-content-end"><b>Rs. {{ number_format($total) }}</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">    </x-slot>
</x-web.app-layout>
