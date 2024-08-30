<div class="toolbox">
    <div class="toolbox-left">
        {{-- <div class="toolbox-info">
            Showing <span>9 of 56</span> Products
        </div><!-- End .toolbox-info --> --}}
    </div><!-- End .toolbox-left -->

    <div class="toolbox-right">
        <div class="toolbox-sort">
            <label for="sortby">Sort by:</label>
            <div class="select-custom">
                <select name="sortby" id="sortby" class="form-control">
                    <option value="popularity" selected="selected">Most Popular</option>
                    <option value="rating">Most Rated</option>
                    <option value="date">Date</option>
                </select>
            </div>
        </div><!-- End .toolbox-sort -->
        <div class="toolbox-layout">
            <a href="category-list.html" class="btn-layout active">
                <svg width="16" height="10">
                    <rect x="0" y="0" width="4" height="4" />
                    <rect x="6" y="0" width="10" height="4" />
                    <rect x="0" y="6" width="4" height="4" />
                    <rect x="6" y="6" width="10" height="4" />
                </svg>
            </a>

            <a href="category-2cols.html" class="btn-layout">
                <svg width="10" height="10">
                    <rect x="0" y="0" width="4" height="4" />
                    <rect x="6" y="0" width="4" height="4" />
                    <rect x="0" y="6" width="4" height="4" />
                    <rect x="6" y="6" width="4" height="4" />
                </svg>
            </a>

            <a href="category.html" class="btn-layout">
                <svg width="16" height="10">
                    <rect x="0" y="0" width="4" height="4" />
                    <rect x="6" y="0" width="4" height="4" />
                    <rect x="12" y="0" width="4" height="4" />
                    <rect x="0" y="6" width="4" height="4" />
                    <rect x="6" y="6" width="4" height="4" />
                    <rect x="12" y="6" width="4" height="4" />
                </svg>
            </a>

            <a href="category-4cols.html" class="btn-layout">
                <svg width="22" height="10">
                    <rect x="0" y="0" width="4" height="4" />
                    <rect x="6" y="0" width="4" height="4" />
                    <rect x="12" y="0" width="4" height="4" />
                    <rect x="18" y="0" width="4" height="4" />
                    <rect x="0" y="6" width="4" height="4" />
                    <rect x="6" y="6" width="4" height="4" />
                    <rect x="12" y="6" width="4" height="4" />
                    <rect x="18" y="6" width="4" height="4" />
                </svg>
            </a>
        </div><!-- End .toolbox-layout -->
    </div><!-- End .toolbox-right -->
</div><!-- End .toolbox -->

<div class="products mb-3">
    @foreach ($products as $product)
        @php
            $f = 0;
            $avg = 0;
            $sum = 0;
            foreach ($reviews as $review) {
                if ($product->id == $review->product_id) {
                    $sum += $review->rating;
                    $f++;
                }
            }
            if ($f > 0) {
                $avg = $sum / $f;
            }
        @endphp
        <div class="product product-list">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <figure class="product-media">
                        {{-- <span class="product-label label-new">New</span> --}}
                        <a href="{{ url('product/' . $product->slug) }}">
                            <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                alt="Product image" class="product-image">
                        </a>
                    </figure><!-- End .product-media -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-6 col-lg-3 order-lg-last">
                    <div class="product-list-action">
                        <div class="product-price">
                            {{ number_format($product->price) }}
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: {{ $avg * 20 }}%;">
                                </div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( {{ $f }} Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-action">
                            {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                title="Quick view"><span>quick view</span></a>
                            <a href="#" class="btn-product btn-compare"
                                title="Compare"><span>compare</span></a> --}}
                        </div><!-- End .product-action -->
                        <input type="hidden" class="qty" name="qty" value="1">
                        <a href="javascript:void(0);" class="btn-product btn-cart"
                            onclick="create_cart( {{ $product->id }})"><span>add to
                                cart</span></a>
                    </div><!-- End .product-list-action -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-lg-6">
                    <div class="product-body product-action-inner">
                        <a href="javascript:void(0);" class="btn-product btn-wishlist"
                            title="Add to wishlist"
                            onclick="create_wish( {{ $product->id }})"><span>add to
                                wishlist</span></a>
                        <div class="product-cat">
                            {{-- <a href="#">Women</a> --}}
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a
                                href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a>
                        </h3><!-- End .product-title -->

                        <div class="product-content">
                            <p>{{ $product->short_desc }} </p>
                        </div><!-- End .product-content -->

                        {{-- <div class="product-nav product-nav-thumbs">
                            <a href="#" class="active">
                                <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                            </a>
                            <a href="#">
                                <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                            </a>

                            <a href="#">
                                <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                            </a>
                        </div><!-- End .product-nav --> --}}
                    </div><!-- End .product-body -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .product -->
    @endforeach
</div><!-- End .products -->

<nav aria-label="Page navigation">
    {{-- <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
            </a>
        </li>
        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item-total">of 6</li>
        <li class="page-item">
            <a class="page-link page-link-next" href="#" aria-label="Next">
                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
            </a>
        </li>
    </ul> --}}
    {{ $products->links() }}
</nav>