<div class="album py-3">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
        <ul class="aa-product-catg">
                       
                       
            <!-- start single product item -->
            @foreach($products as $product)
             
             <li>
                <figure>
                    <a class="aa-product-img" href="{{url('product')}}/{{$product->id}}">
                        <img src="{{ asset('storage/images/products/'. $product->image) }}" width="250px" height="300px"></a>
                    <form action="{{url('cart')}}" method="post" class="create_cart">
                        @csrf
                        <input type="hidden"  value="{{$product->id}}" name="p_id"> 
                        <input type="hidden"  value="1" name="qty">
                            <button class="aa-add-card-btn"><span class="fa fa-shopping-cart"></span>
                                Add To Cart
                            </button>
                    </form>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product')}}/{{$product->id}}">{{$product->name}}</a></h4>
                        <span class="aa-product-price">Rs: {{$product->price}}</span>
                    </figcaption>
                </figure>
                 {{-- <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top"
                         title="Add to Wishlist"><span
                             class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top"
                         title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top"
                         title="Quick View" data-toggle="modal"
                         data-target="#quick-view-modal"><span
                             class="fa fa-search"></span></a>
                 </div> --}}
                 <!-- product badge -->
                 {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
             </li>

             @endforeach
         </ul>        
    </div>
</div>
    <div class="row mt-4 pt-3">
        <div class="col-md-12 d-flex justify-content-center">
            {{-- {{$products->links()}} --}}
        </div>
    </div>