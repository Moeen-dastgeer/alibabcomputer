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

<a class="aa-cart-link" href="#">
    <span class="fa fa-shopping-basket"></span>
    <span class="aa-cart-title">SHOPPING CART</span>
    <span class="aa-cart-notify">{{$count}}</span>
  </a>
  <div class="aa-cartbox-summary">
    @if(session('cart'))
    @foreach(session('cart') as $id => $cart)
    <ul>

      <li>
        <a class="aa-cartbox-img" href="#"><img src="{{asset('storage/images/products/')}}/{{$cart['image']}}" alt="img"></a>
        <div class="aa-cartbox-info">
          <h4>{{$cart['name']}}</h4>
          <p>{{$cart['qty']}} x {{number_format($cart['price'])}} = {{number_format($cart['qty']*$cart['price'])}}</p>
        </div>
        <span class="fa fa-times aa-remove-product" onclick="deletecart1({{ $id }})"></span>
      </li>
       @endforeach    
      <li>
        <span class="aa-cartbox-total-title">
          Total
        </span>
        <span class="aa-cartbox-total-price">
         {{number_format($total)}}
        </span>
      </li>
    </ul>
    <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('/cart') }}">
      View Cart
  </a>
  <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('/checkout') }}">
      Checkout
  </a>
    @endif
  </div>