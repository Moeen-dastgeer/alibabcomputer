<x-web.app-layout>
    <x-slot name="header">

    </x-slot>
    <x-slot name="title">
        Filter Product
    </x-slot>

    <div id="msg">

    </div>    


<main class="my-3">
    <div class="container">
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success text-center" id="msg" style="position:absolute;top:10%;left:75%;">	
                <strong>{{ $message }}</strong>
        </div>
        @endif

        
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="card rounded-0">
                    <div class="card-header">
                        <h5 class="text-uppercase fw-bold">Filter by</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase">Filter Options</h6>
                        <h6 class="border-bottom border-2 pb-2">Categories</h6>
                        <div class="list-group mb-3">
                            @foreach($categories as $cat)
                            <label class="list-group-item border-0">
                                <input class="form-check-input me-1 cat" type="checkbox" value="{{$cat->id}}" {{$cat->slug == $selectedCategory || $selectedCategory == NULL?"checked": ""}}>{{$cat->name}}
                            </label>
                            @endforeach
                        </div>
                        <h6 class="border-bottom border-2 pb-2">Manufacturer</h6>
                        <div class="list-group mb-3">
                            @foreach($manufacturer as $manufac)
                            <label class="list-group-item border-0">
                                <input class="form-check-input me-1 manufac" type="checkbox" value="{{$manufac->id}}">{{$manufac->name}}
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="card rounded-0 border-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                               <h4 class=" text-uppercase">Products Filter</h4>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="card-body p-0" id="filter">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<x-slot name="footer">

<script>
$(document).ready(function(){
          $('.cat,.manufac').on('change', function(){
            var manufac = get_filter('manufac');
            var cat = get_filter('cat');
            $.ajax({
                url:'{{url("filter-data/")}}',
                method:"GET",
                data:{
                  cat:cat,
                  manufac:manufac
                },
                success:function(data){
                  // console.log(data);
                  $('#filter').html(data);
              }
            });
          });

         function get_filter(class_name)
          {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
              filter.push($(this).val());
            }); 
            // console.log(filter);
            return filter;
          }
        });

//         function fetchdata() {
//     $.ajax({
//         type: "GET",
//         url: "/fetch_data",
//         success: function (data) {
//           $('#cart').html(data);
//         }
//     });
// }


//     $('.create_cart').on('submit', function(e){
//         e.preventDefault();
//         $.ajax({
//             url:$(this).attr('action'),
//             type:"POST",
//             data:$(this).serialize(),
//             success:function(data){
//                 if(data.status == 'success'){
//                     $('#msg').html(`<div class="alert alert-success alert-dismissible" role="alert">
//                     <strong>Success! </strong>` +data.message+`
//                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//                     </div>`);  
            
//         }
//         $('#cart').html("");
//         fetchdata();    
        
//             }
//         });
//     });
        
</script>

</x-slot>
</x-web.app-layout>