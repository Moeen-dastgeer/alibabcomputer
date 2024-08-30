<x-web.app-layout>
    <x-slot name="header">
        
    </x-slot>
    <x-slot name="title">
        Cart
    </x-slot>



    <!-- Cart view section -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table" id="cart_page_data">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Delete</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            {{-- <th>Update</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $cart)
                                                <tr>
                                                    <td><i onclick="deletecart({{ $id }})" class="fa fa-close remove"></i></td>
                                                    <td><a href="#"><img
                                                                src="{{ asset('storage/images/products/' . $cart['image']) }}"
                                                                alt="img"></a></td>
                                                    <td>{{ $cart['name'] }}</td>
                                                    <td>Rs: {{ number_format($cart['price']) }}</td>
                                                    <td>
                                                        <input class="aa-cart-quantity" type="number" name="qty"
                                                            value="{{ $cart['qty'] }}"
                                                            onchange="updateqty({{ $id }},$(this))">
                                                        <input class="aa-cart-quantity" type="hidden" name="sid"
                                                            value="{{ $id }}">
                                                        {{-- {{$cart['qty']}} --}}
                                                    </td>
                                                    <td>Rs. {{ number_format($cart['price'] * $cart['qty']) }}</td>
                                                    {{-- <td><button type="submit" class="aa-cart-view-btn" style="padding:14px 14px; float:none;">Update Cart</button></td> --}}
                                                </tr>

                                                @php
                                                    $total += $cart['price'] * $cart['qty'];
                                                @endphp
                                            @endforeach

                                            <tr>
                                                <td colspan="6">
                                                    <a class="aa-cart-view-btn" href="{{ url('/') }}"
                                                        style="margin-top: 20px; float:left;">Continue Shoping</a>

                                                        <a class="aa-cart-view-btn" href="{{ url('/clear_cart') }}"
                                                        style="margin-top: 20px;">Clear Cart</a>       
                                                </td>

                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                        <tr>
                                            <th>Total</th>
                                            <td>{{ number_format($total) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ url('checkout') }}" class="aa-cart-view-btn">Proceed to Checkout</a>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
    <x-slot name="footer">
        <script>
           
           function cart_ajax_fun() {
                $.ajax({
                    type: "GET",
                    url: "/cart_fetch_data",
                    success: function(data) {
                      $('#cart_page_data').html(data);
                    }
                });
            }


            function updateqty(id, value) {
                var qty = value.val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '{{ url('update_cart') }}',
                    data: {qty: qty, _token: _token, id: id},
                    success: function(data) {
                        if (data.status == 'success') {
                        notification(data.status,data.message);  
                          cart_ajax_fun();
                        }
                    }
                });
            }

     function deletecart(id) {
                
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '{{ url('/delete_cart') }}',
                    data: {_token: _token, id: id},
                    success: function(data) {
                        if (data.status == 'success') {
                        notification(data.status,data.message);  
                          cart_ajax_fun();
                        }
                    }
                });
            }


        </script>

    </x-slot>
</x-web.app-layout>
