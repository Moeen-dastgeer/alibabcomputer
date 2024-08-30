<x-web.app-layout>
    <x-slot name="header">
    
    </x-slot>
    <x-slot name="title">
        Checkout
    </x-slot>

    

<!-- Cart view section -->
 <section id="checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="checkout-area">
            <form action="{{url('order')}}" method="post">
                @csrf
             <div class="row">
               <div class="col-md-8">
                 <div class="checkout-left">
                   <div class="panel-group" id="accordion">
                     {{-- <!-- Coupon section -->
                     <div class="panel panel-default aa-checkout-coupon">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                             Have a Coupon?
                           </a>
                         </h4>
                       </div>
                       <div id="collapseOne" class="panel-collapse collapse in">
                         <div class="panel-body">
                           <input type="text" placeholder="Coupon Code" class="aa-coupon-code">
                           <input type="submit" value="Apply Coupon" class="aa-browse-btn">
                         </div>
                       </div>
                     </div> --}}
                     <!-- Login section -->
                     {{-- <div class="panel panel-default aa-checkout-login">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                             Client Login 
                           </a>
                         </h4>
                       </div>
                       <div id="collapseTwo" class="panel-collapse collapse">
                         <div class="panel-body">
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
                           <input type="text" placeholder="Username or email">
                           <input type="password" placeholder="Password">
                           <button type="submit" class="aa-browse-btn">Login</button>
                           <label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                           <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                         </div>
                       </div>
                     </div> --}}
                     <!-- Billing Details -->
                     {{-- <div class="panel panel-default aa-checkout-billaddress">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                             Billing Details
                           </a>
                         </h4>
                       </div>
                       <div id="collapseThree" class="panel-collapse collapse">
                         <div class="panel-body">
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="First Name*">
                               </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="Last Name*">
                               </div>
                             </div>
                           </div> 
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="Company name">
                               </div>                             
                             </div>                            
                           </div>  
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="email" placeholder="Email Address*">
                               </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="tel" placeholder="Phone*">
                               </div>
                             </div>
                           </div> 
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <textarea cols="8" rows="3">Address*</textarea>
                               </div>                             
                             </div>                            
                           </div>   
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <select>
                                   <option value="0">Select Your Country</option>
                                   <option value="1">Australia</option>
                                   <option value="2">Afganistan</option>
                                   <option value="3">Bangladesh</option>
                                   <option value="4">Belgium</option>
                                   <option value="5">Brazil</option>
                                   <option value="6">Canada</option>
                                   <option value="7">China</option>
                                   <option value="8">Denmark</option>
                                   <option value="9">Egypt</option>
                                   <option value="10">India</option>
                                   <option value="11">Iran</option>
                                   <option value="12">Israel</option>
                                   <option value="13">Mexico</option>
                                   <option value="14">UAE</option>
                                   <option value="15">UK</option>
                                   <option value="16">USA</option>
                                 </select>
                               </div>                             
                             </div>                            
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="Appartment, Suite etc.">
                               </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="City / Town*">
                               </div>
                             </div>
                           </div>   
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="District*">
                               </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" placeholder="Postcode / ZIP*">
                               </div>
                             </div>
                           </div>                                    
                         </div>
                       </div>
                     </div> --}}
                     <!-- Shipping Address -->
                     <div class="panel panel-default aa-checkout-billaddress">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                             Shippping Address
                           </a>
                         </h4>
                       </div>
                       <div id="collapseFour" class="panel-collapse collapse">
                         <div class="panel-body">
                          <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" name="fname" value="{{old('fname',Auth::guard('web')->user()->first_name)}}" placeholder="First Name*">
                                 <span class="text-danger">
                                    @error('fname')
                                    {{$message}}
                                    @enderror 
                                  </span>
                               </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" name="lname" value="{{old('lname',Auth::guard('web')->user()->last_name)}}" placeholder="Last Name*">
                                 <span class="text-danger">
                                    @error('lname')
                                    {{$message}}
                                    @enderror 
                                 </span>
                                </div>
                             </div>
                           </div>   
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="email" name="email" value="{{old('email',Auth::guard('web')->user()->email)}}"  placeholder="Email Address*">
                                 <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror 
                                  </span>
                                </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="tel" name="phone" value="{{old('phone',Auth::guard('web')->user()->phone)}}" placeholder="Phone*">
                                 <span class="text-danger">
                                    @error('phone')
                                    {{$message}}
                                    @enderror 
                                  </span>
                                </div>
                             </div>
                           </div> 
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <textarea cols="8" rows="3" name="address" placeholder="Address*">{{old('address')}}</textarea>
                                 <span class="text-danger">
                                    @error('address')
                                    {{$message}}
                                    @enderror 
                                  </span>
                                </div>                             
                             </div>                            
                           </div>    
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" name="city" value="{{old('city')}}" placeholder="District*">
                                 <span class="text-danger">
                                    @error('city')
                                    {{$message}}
                                    @enderror 
                                  </span>
                                </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" name="post_code" value="{{old('post_code')}}" placeholder="Postcode / ZIP*">
                                 <span class="text-danger">
                                    @error('post_code')
                                    {{$message}}
                                    @enderror 
                                  </span>
                                </div>
                             </div>
                           </div> 
                            {{-- <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <textarea cols="8" rows="3">Special Notes</textarea>
                               </div>                             
                             </div>                            
                           </div>               --}}
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="checkout-right">
                   <h4>Order Summary</h4>
                   <div class="aa-order-summary-area">
                     <table class="table table-responsive">
                       <thead>
                         <tr>
                           <th>Product</th>
                           <th>Total</th>
                         </tr>
                       </thead>
                       <tbody>
                        @php $total=0; @endphp
                         @if(session('cart'))
                         @foreach(session('cart') as $id => $cart)
                         <tr>
                           <td>{{$cart['name']}} <strong> x  {{$cart['qty']}}</strong></td>
                           <td>{{$cart['price'] * $cart['qty']}}</td>
                         </tr>
                         @php $total+=($cart['price']*$cart['qty']); @endphp
                         @endforeach
                         @endif
                       </tbody>
                       <tfoot>
                         {{-- <tr>
                           <th>Subtotal</th>
                           <td>$750</td>
                         </tr>
                          <tr>
                           <th>Tax</th>
                           <td>$35</td>
                         </tr> --}}
                          <tr>
                           <th>Total</th>
                           <td>{{$total}}</td>
                         </tr>
                       </tfoot>
                     </table>
                   </div>
                   {{-- <div class="aa-payment-method">                     --}}
                     {{-- <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label>
                     <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" checked> Via Paypal </label>
                     <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">     --}}
                            @if($total==0)
                                <button type="submit" value="Place Order" class="aa-browse-btn" style="width: 100%;">Order Place</button>
                            @else
                                <button type="submit" value="Place Order" class="aa-browse-btn" style="width: 100%;">Order Place</button>
                            @endif
                     {{-- <button type="submit" value="Place Order" class="aa-browse-btn">Order Place</button>                 --}}
                   {{-- </div> --}}
                 </div>
               </div>
             </div>
           </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->

  <x-slot name="footer">
            

  </x-slot>
  </x-web.app-layout>
  