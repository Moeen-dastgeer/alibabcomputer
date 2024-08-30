<h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: {{ $rating * 20 }}%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">(
                                        {{ $count }} Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    PKR {{ number_format($price) }}
                                    @if($product->discount_price > 0)
                                    <sup>PKR <s>{{number_format($product->discount_price+$product->price)}}</s></sup>
                                    @endif
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{{ $product->short_desc }} </p>
                                </div><!-- End .product-content -->
                                {{-- 
                                <div class="details-filter-row details-row-size">
                                    <label>Color:</label>

                                    <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="assets/images/products/single/1-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="assets/images/products/single/2-thumb.jpg" alt="product desc">
                                        </a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .details-filter-row --> --}}
                                <form id="form">
                                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                                    @if ($variants_count > 0)
                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Hardisk:</label>
                                            <div class="select-custom">
                                                <select name="size" id="size" class="form-control size">
                                                    @foreach ($variants_values as $variant_value)
                                                        <option value="{{ $variant_value->price }}" {{$variant_value->price==$price?'selected':''}}>{{ $variant_value->variant_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .details-filter-row -->
                                    @endif
                                    <div class="details-filter-row details-row-size my-5">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            @php 
                                                $qty = 1;
                                            @endphp
                                            <input type="number" class="qty qty1" id="qty1" name="qty"
                                                value="{{$qty}}" class="form-control" min="1" max="10"
                                                step="1" data-decimals="0">
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                </form>
                                <div class="product-details-action">
                                    <div href="javascript:void(0);" class="btn-product btn-cart"
                                        onclick="create_cart({{ $product->id }})"><span>add to cart</span></div>
                                    <div class="details-action-wrapper">
                                        <a href="javascript:void(0);" class="btn-product btn-wishlist" title="Wishlist"
                                            onclick="create_wish( {{ $product->id }})"><span>Add to
                                                Wishlist</span></a>
                                        {{-- <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to
                                                Compare</span></a> --}}
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                {{-- <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div><!-- End .product-cat --> --}}

                                <!--<div class="social-icons social-icons-sm">-->
                                <!--    <span class="social-label">Share:</span>-->
                                <!--    <a href="#" class="social-icon" title="Facebook" target="_blank"><i-->
                                <!--            class="icon-facebook-f"></i></a>-->
                                <!--    <a href="#" class="social-icon" title="Twitter" target="_blank"><i-->
                                <!--            class="icon-twitter"></i></a>-->
                                <!--    <a href="#" class="social-icon" title="Instagram" target="_blank"><i-->
                                <!--            class="icon-instagram"></i></a>-->
                                <!--    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i-->
                                <!--            class="icon-pinterest"></i></a>-->
                                <!--</div>-->
                                {{-- </div><!-- End .product-details-footer --> --}}
                            </div>