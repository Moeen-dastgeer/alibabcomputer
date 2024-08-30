<x-web.app-layout>
    <x-slot name="header"></x-slot>
    <x-slot name="title">
        Product Category
    </x-slot>
    <x-slot name="search">
        {{ @$search }}
    </x-slot>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('web/assets/images/page-header-bg.jpg')}}')">
            <div class="container">
                <h1 class="page-title">List<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9" id="filter">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                {{-- <div class="toolbox-info">
                                    Showing <span>9 of 56</span> Products
                                </div><!-- End .toolbox-info --> --}}
                            </div><!-- End .toolbox-left -->
                        </div>    
                        <div class="products mb-3">
                            @foreach ($products as $product)
                                @php
                                    $f = 0;$avg = 0;$sum = 0;
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
                                                    PKR {{ number_format($product->price) }}
                                                    @if ($product->discount_price >0 )
                                                    <sup>PKR <s>{{number_format($product->discount_price+$product->price )}}</s></sup>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: {{ $avg * 20 }}%;">
                                                        </div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( {{ $f }} Reviews )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <!--<a href="popup/quickView.html" class="btn-product btn-quickview"-->
                                                    <!--    title="Quick view"><span>quick view</span></a>-->
                                                    <!--<a href="#" class="btn-product btn-compare"-->
                                                    <!--    title="Compare"><span>compare</span></a>-->
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
                                                        href="{{ url('product/' . $product->slug) }}">{{  Str::limit($product->name, 50, '...') }}</a>
                                                </h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p class="">{{  Str::limit(Str::ucfirst($product->short_desc), 200, '...') }} </p>
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
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <form action="#" method="get" id="filterForm">
                            <div class="sidebar sidebar-shop">
                                <div class="widget widget-clean">
                                    <label>Filters</label>
                                    {{-- <a href="javascript:void(0);" class="sidebar-filter-clear">Clean All</a> --}}
                                </div><!-- End .widget widget-clean -->
    
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                            aria-controls="widget-1">
                                            Category
                                        </a>
                                    </h3><!-- End .widget-title -->
    
                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                @php $i=1; @endphp
                                                @foreach ($categories as $category)
                                                    @php
                                                        $count = 0;
                                                        foreach ($products1 as $product) {
                                                            if ($category->id == $product->cat_id) {
                                                                $count++;
                                                            }
                                                        }
                                                    @endphp
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="categories[]" class="custom-control-input filters"
                                                                id="cat-{{$i}}" value="{{ $category->id }}"
                                                                {{ $category->slug == $selectedCategory ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="cat-{{$i++}}">{{ $category->name }}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                        <span class="item-count">{{ $count }}</span>
                                                    </div><!-- End .filter-item -->
                                                @endforeach
    
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
    
                                {{-- <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                            Size
                                        </a>
                                    </h3><!-- End .widget-title -->
    
                                    <div class="collapse show" id="widget-2">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-1">
                                                        <label class="custom-control-label" for="size-1">XS</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
    
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-2">
                                                        <label class="custom-control-label" for="size-2">S</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
    
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="size-3">
                                                        <label class="custom-control-label" for="size-3">M</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
    
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="size-4">
                                                        <label class="custom-control-label" for="size-4">L</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
    
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-5">
                                                        <label class="custom-control-label" for="size-5">XL</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
    
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-6">
                                                        <label class="custom-control-label" for="size-6">XXL</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget --> --}}
    
                                {{-- <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                            Colour
                                        </a>
                                    </h3><!-- End .widget-title -->
    
                                    <div class="collapse show" id="widget-3">
                                        <div class="widget-body">
                                            <div class="filter-colors">
                                                <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                            </div><!-- End .filter-colors -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget --> --}}
    
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                            aria-controls="widget-4">
                                            Brand
                                        </a>
                                    </h3><!-- End .widget-title -->
    
                                    <div class="collapse show" id="widget-4">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                @php $j=1; @endphp
                                                @foreach ($manufacturer as $manufacturer)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="manufacturers[]" class="custom-control-input filters"
                                                                id="brand-{{$j}}" value="{{ $manufacturer->id }}">
                                                            <label class="custom-control-label"
                                                                for="brand-{{$j++}}">{{ $manufacturer->name }}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .filter-item -->
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
    
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                            Price
                                        </a>
                                    </h3><!-- End .widget-title -->
    
                                    <div class="collapse show" id="widget-5">
                                        <div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                    Price Range:
                                                    <span id="filter-price-range">
                                                        <br>Min
                                                        <input type="number" name="min" class="form-control filters">
                                                        Max
                                                        <input type="number" name="max" class="form-control filters">
                                                    </span>
                                                </div><!-- End .filter-price-text -->
                                            </div><!-- End .filter-price -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-shop -->
                        </form>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <x-slot name="footer">
        <script>
            $(document).ready(function(){
                $(document).on('click','.pagination a', function(e){
                    e.preventDefault();
                    var page_number = $(this).attr('href').split('page=')[1];
                    fetch_products('shop-fliter?page='+page_number);
                });

                $(document).on('change', '.filters', function(event) {
                    event.preventDefault();
                    fetch_products("shop-fliter?page=1");
                });

            });
            function fetch_products(page){ 
                // alert(page);
                $.ajax({
                    url: page,
                    data: $('#filterForm').serialize(),
                    success:function(data){
                        $('#filter').html(data);
                    }
                });
            }
   
        </script>

    </x-slot>
</x-web.app-layout>
