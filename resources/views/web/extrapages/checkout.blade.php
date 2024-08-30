<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Product Details
    </x-slot>

    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('web/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        {{-- <form action="#">
              <input type="text" class="form-control"  id="checkout-discount-input">
                <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
              </form> --}}
                    </div><!-- End .checkout-discount -->
                    <form action="{{ url('/order') }}" method="post" id="filterForm" onsubmit="order(event)">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Shipping Address</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="fname" id="fname" class="form-control"
                                            value="{{ old('fname') }}" placeholder="First Name*">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="lname" id="lname" class="form-control"
                                            value="{{ old('lname') }}" placeholder="Last Name*">
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Email Address <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Email Address*">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone No <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone') }}" placeholder="Phone*">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <label>Your Address <span class="text-danger">*</span></label>
                                <textarea cols="8" rows="3" name="address" id="address" class="form-control" placeholder="Address*">{{ old('address') }}</textarea>
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP <span class="text-danger">*</span></label>
                                        <input type="text" name="post_code" id="post_code"
                                            value="{{ old('post_code') }}" class="form-control">
                                        <span class="text-danger">
                                            @error('post_code')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" value="{{ old('city') }}"
                                            class="form-control">
                                    </div>
                                </div><!-- End .row -->
                                @if(!Auth::guard('web')->user())
                                <div class="row">
                                    <div class="form-check">
                                        <input type="hidden" name="check" value="1">
                                        <input type="checkbox" name="check" value="2"  id="checkbox"  onchange="checkform(this)">
                                        <label for="checkbox" id="check">
                                          Do you want register account with same information
                                        </label>
                                    </div>
                                </div>
                                <div id="form1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                value="{{ old('first_name') }}" placeholder="First Name*">
                                        </div><!-- End .col-sm-6 -->
                                        <div class="col-sm-6">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                value="{{ old('last_name') }}" placeholder="Last Name*">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Email Address <span class="text-danger">*</span></label>
                                            <input type="text" name="email1" id="email1" class="form-control"
                                                value="{{ old('email') }}" placeholder="Email Address*">
                                        </div><!-- End .col-sm-6 -->
                                        <div class="col-sm-6">
                                            <label>Phone No <span class="text-danger">*</span></label>
                                            <input type="tel" name="phone1" id="phone1" class="form-control"
                                                value="{{ old('phone') }}" placeholder="Phone*">
                                            <span class="text-danger">
                                                @error('phone')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div><!-- End .col-sm-6 -->
                                        <div class="col-sm-12">
                                            <label>Your Address <span class="text-danger">*</span></label>
                                            <textarea cols="8" rows="3" name="address1" id="address1" class="form-control" placeholder="Address*">{{ old('address') }}</textarea>
                                        </div>
                                    </div><!-- End .row -->
                                </div>
                                
                                {{-- </div> --}}
                                @endif

                                {{-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
              </div><!-- End .custom-checkbox --> --}}

                                {{-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
              </div><!-- End .custom-checkbox --> --}}

                                {{-- <label>Order notes (optional)</label> --}}
                                {{-- <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea> --}}
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $total = 0; @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $cart)
                                                    <tr>
                                                        <td><a href="#">{{ $cart['name'] }}</a></td>
                                                        <td>{{ number_format($cart['price'] * $cart['qty']) }}</td>
                                                    </tr>
                                                    @php
                                                        $total += $cart['price'] * $cart['qty'];
                                                    @endphp
                                                @endforeach
                                            @endif

                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>{{ number_format($total) }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>{{ number_format(200) }}</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{ number_format($total + 200) }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    {{-- <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1"
                                                        aria-expanded="true" aria-controls="collapse-1">
                                                        Direct bank transfer
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Make your payment directly into our bank account. Please use your
                                                    Order ID as the payment reference. Your order will not be shipped
                                                    until the funds have cleared in our account.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-2" aria-expanded="false"
                                                        aria-controls="collapse-2">
                                                        Check payments
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                                    Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-3" aria-expanded="false"
                                                        aria-controls="collapse-3">
                                                        Cash on delivery
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor
                                                    sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                                    mattis eros.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-4" aria-expanded="false"
                                                        aria-controls="collapse-4">
                                                        PayPal <small class="float-right paypal-link">What is
                                                            PayPal?</small>
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non,
                                                    semper suscipit, posuere a, pede. Donec nec justo eget felis
                                                    facilisis fermentum.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-5" aria-expanded="false"
                                                        aria-controls="collapse-5">
                                                        Credit Card (Stripe)
                                                        <img src="assets/images/payments-summary.png"
                                                            alt="payments cards">
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                                data-parent="#accordion-payment">
                                                <div class="card-body"> Donec nec justo eget felis facilisis
                                                    fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion --> --}}

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <x-slot name="footer">
        <script>
            function order(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('/order') }}",
                    type: "post",
                    data: $('#filterForm').serialize(),
                    success: function(data) {
                        $("p.error").remove();
                        if (data.status == "errors") {
                            jQuery.each(data.errors, function(key, val) {
                                $("#" + key.replaceAll('.', '_')).after(
                                    '<p class="small text-danger error">' + val[0] + '</p>');
                            });
                        }
                        if (data.status == "success") {
                            notification(data.status, data.message);
                            $("#filterForm").trigger("reset");
                            return false;
                        }
                        if (data.status == "error") {
                            notification(data.status, data.message);
                           
                        }
                    }
                });
            }
                function checkform(a)
                {
                    if(a.checked)
                    {
                       $("#form1").css("display", "none");  
                    }
                    else
                    {
                        $("#form1").css("display", "block");  
                    }
                }
           
        </script>

    </x-slot>
</x-web.app-layout>
