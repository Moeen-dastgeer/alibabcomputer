@php    
    $total = 0;
    $count = 0;
    if(session('cart')){
        foreach(session('cart') as $id => $cart)
        {
            $total += ($cart['price']*$cart['qty']);
            $count++;
        }
    }
@endphp

<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
  <div class="icon">
      <i class="icon-shopping-cart"></i>
      <span class="cart-count">{{$count}}</span>
  </div>
  <p>Cart</p>
</a>
@if ($count > 0)
<div class="dropdown-menu dropdown-menu-right">
  <div class="dropdown-cart-products">
      @foreach (session('cart') as $id => $cart)
          <div class="product">
              <div class="product-cart-details">
                  <h4 class="product-title">
                    <a  href="{{ url('product/' . $cart['slug']) }}"> {{ Str::limit($cart['name'], 20, '...') }} </a>
                  </h4>

                  <span class="cart-product-info">
                      <span class="cart-product-qty">{{ $cart['qty'] }}</span>
                      x {{ number_format($cart['price']) }} = {{ number_format($cart['qty'] * $cart['price']) }}
                  </span>
              </div><!-- End .product-cart-details -->

              <figure class="product-image-container">
                <a  href="{{ url('product/' . $cart['slug']) }}">
                      <img src="{{ asset('storage/images/products/') }}/{{ $cart['image'] }}" alt="product">
                  </a>
              </figure>
              <a href="#" class="btn-remove" title="Remove Product" onclick="deletecart1({{ $id }})"><i class="icon-close"></i></a>
          </div><!-- End .product -->
      @endforeach
  </div><!-- End .cart-product -->

  <div class="dropdown-cart-total">
      <span>Total</span>

      <span class="cart-total-price">{{number_format($total)}}</span>
  </div><!-- End .dropdown-cart-total -->

  <div class="dropdown-cart-action">
      <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
      <a href="{{url('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
  </div><!-- End .dropdown-cart-total -->
</div><!-- End .dropdown-menu -->
@endif 