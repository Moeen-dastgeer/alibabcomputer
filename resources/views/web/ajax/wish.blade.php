@php    
    $total1 = 0;
    $count1 = 0;
    if(session('wish')){
        foreach(session('wish') as $id => $wish)
        {
            $total1 += $wish['price'];
            $count1++;
        }
    }
@endphp
<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-display="static">
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                <span class="cart-count">{{ $count1 }}</span>
                            </div>
                            <p>Wish List</p>
                        </a>
                        @if ($count1 > 0)
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                    @foreach (session('wish') as $id => $wish)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a  href="{{ url('product/' . $wish['slug']) }}"> {{$wish['name']}} </a>
                                                </h4>
                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">Price : {{ $wish['price'] }}</span>
                                                    <input type="hidden" id="qty" name="qty" value="1"><br>
                                                <a href="javascript:void(0);" class="" onclick="create_cart( {{ $id }},{{ $id }})">Add to Cart</a>
                                                </span>
                                            </div><!-- End .product-cart-details -->
                                            <figure class="product-image-container">
                                                <a  href="{{ url('product/' . $wish['slug']) }}">
                                                    <img src="{{ asset('storage/images/products/') }}/{{ $wish['image'] }}"
                                                        alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i
                                                    class="icon-close" onclick="deletewish({{ $id }})"></i></a>
                                                    
                                        </div><!-- End .product -->
                                    @endforeach
                            </div><!-- End .cart-product -->
                            <div class="dropdown-cart-total">
                                <span>Total</span>
    
                                <span class="cart-total-price">{{ number_format($total1) }}</span>
                            </div><!-- End .dropdown-cart-total -->
    
                            <div class="dropdown-cart-action">
                                {{-- <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                                <a href="{{url('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                        class="icon-long-arrow-right"></i></a> --}}
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                        @endif