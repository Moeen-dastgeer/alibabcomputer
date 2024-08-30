<x-admin.app-layout>
    <x-slot name="title">Products</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>

    <div class="card card-white">
        <div class="card-header">
            <div class="row">  <div class="col-md-6">
                    <h4>Add new</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('/admin/products/list') }}" class="btn btn-sm btn-warning">
                      <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ url('/admin/products/create') }}" method="POST" id="product_form" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                {{-- <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span> --}}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Category<span class="text-danger">*</span></label><br>
                                <select name="category" id="category" class="form-control">
                                    <option value="">......Select......</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <span class="text-danger">
                                  @error('category')
                                      {{ $message }}
                                  @enderror
                                </span> --}}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Manufacturer<span class="text-danger">*</span></label><br>
                                <select name="manufacturer" id="manufacturer" class="form-control">
                                    <option value="">......Select......</option>
                                    @foreach ($manufacturer as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <span class="text-danger">
                                  @error('manufacturer')
                                      {{ $message }}
                                  @enderror
                                </span> --}}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Vendor<span class="text-danger">*</span></label><br>
                                <select name="vendor" id="vendor" class="form-control">
                                    <option value="">......Select......</option>
                                    @foreach ($vendor as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <span class="text-danger">
                                  @error('vendor')
                                      {{ $message }}
                                  @enderror
                                </span> --}}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Price<span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                                {{-- <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span> --}}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Price Discount</label>
                                <input type="number" name="price_discount" id="price_discount" 
                                    class="form-control"value="{{ old('price_discount') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Keywords</label>
                                <input type="text" name="keywords" id="keywords" class="form-control"
                                    value="{{ old('keywords') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Stock</label><br>
                                <input type="number" name="qty" id="qty" class="form-control" value="{{ old('qty') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Variable Product</label>
                                <select name="variant" class="form-control" onchange="variable_product($(this))">
                                    <option>......Select......</option>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="variant-form" style="display: none;">
                            <div class="col-md-12">
                                <div class="row" id="variant_name">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Variant Type</label>
                                            <select name="attr_name" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($variant_type as $variant)
                                                    <option value="{{$variant->id}}">{{$variant->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row" id="row">
                                        <div class="col-md-4" id="variant_data">
                                            <div class="form-group">
                                                <label for="">Variant Name</label>
                                                <select name="variant_name[]" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($variants as $variant)
                                                        <option value="{{$variant->id}}">{{$variant->variant_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="v_price">Price</label>
                                                <input type="text" name="variant_price[]" id="v_price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" id="addrow">Add More</button>
                                    </div>
                                </div> 
                                {{-- <div class="row">
                                    <div class="col-4">
                                        <button type="button" class="btn btn-primary" id="add_variant_form">Add More</button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-danger" id="remove_variant_form">Remove</button>
                                    </div>
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Main Image <span class="text-danger">*</span></label>
                            <div id="main_image" style="padding-top: .5rem;"></div>
                            {{-- <span class="text-danger">
                                @error('main_image')
                                    {{ $message }}
                                @enderror
                            </span> --}}
                        </div>
                        <div class="form-group imagesbox">
                            <label>Images <span class="text-danger">*</span></label>
                            <div id="product_images" style="padding-top: .5rem;"></div>
                            {{-- <span class="text-danger">
                                @error('product_images')
                                    {{ $message }}
                                @enderror
                            </span> --}}
                        </div>
                    </div>
                </div>
               
                  
                    <label>Short Description<span class="text-danger">*</span></label>
                    <textarea name="short_des" id="short_des" class="form-control">{{ old('short_des') }}</textarea>
                    {{-- <span class="text-danger">
                        @error('short_des')
                            {{ $message }}
                        @enderror
                    </span> --}}
                <label>Long Description<span class="text-danger">*</span></label>
                <textarea id="long_des" name="long_des" class="form-control summernote">{{ old('long_des') }}</textarea>
                {{-- <span class="text-danger">
                    @error('long_des')
                        {{ $message }}
                    @enderror
                </span> --}}
                <div class="form-group col-md-6 col-sm-12">
                    <label>Status</label><br>
                    <input type="radio" id="disable" name="status" value="disable">
                    <label class="form-check-label" for="disable">Disable</label>
                    <input type="radio" id="enable" name="status" value="enable" checked>
                    <label class="form-check-label" for="enable">Enable</label>
                </div>


                <div class="form-check col-md-6 col-sm-12">
                    <input type="checkbox" name="feature" class="form-check-input" value="1">
                    <label class="form-check-label">Feature Product</label>
                </div>
                {{-- <div class="form-group">
          <label for="videoUpload">Video </label>
          <input type="file" name="video" id="videoUpload" class="form-control form-control-sm" style="height:auto;" accept="video/mp4,video/x-m4v,video/*">
          <div class="text-danger clean" id="video_error"></div><br>
          <div id="video_preview"></div>
        </div>
      </div> --}}

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
        <x-slot name="footer">
            <script>
                $('#main_image').imageUploader({
                    imagesInputName: 'main_image',
                    maxFiles: 1
                });
                $('#product_images').imageUploader({
                    imagesInputName: 'product_images',
                    maxFiles: 100
                });

                function variable_product(variant){
                    var status = variant.val();
                    if(status == "yes")
                    {
                        $("#variant-form").css("display", "block");
                    }
                    else
                    {
                        $("#variant-form").css("display", "none");
                    }
                }

                $("body").on("click", "#DeleteRow", function () {
                    $(this).parents("#row").remove();
                })
                  
                $("#addrow").click(function () {
                    var variants = $("#variant_data").html();
                        newRowAdd =
                            '  <div class="row" id="row"> ' +
                            '   <div class="col-md-4" id="variant_data"> '+variants+' </div>' +
                            '   <div class="col-md-4"> <div class="form-group">  <label for="v_price">Price</label>   <input type="text" name="variant_price[]" id="v_price" class="form-control"> </div> </div> ' +
                            '   <div class="col-md-4"> <br> <button type="button" class="btn btn-danger mt-2" id="DeleteRow">Remove</button> </div>' +
                            '  </div>';
                        $('#variant_name').after(newRowAdd);
                });


                    // $("#add_variant_form").click(function () {
                        // var newformAdd = $('#variant-form').html();
                        // console.log(newformAdd);
                        // newformAdd =
                        //     '  <div class="row" id="row"> ' +
                        //     '   <div class="col-md-4"> <div class="form-group">  <label for="size'+counter_row+'">Name</label>   <input type="text" name="size'+counter_row+'" id="size'+counter_row+'" class="form-control"> </div> </div>' +
                        //     '   <div class="col-md-4"> <div class="form-group">  <label for="v_price'+counter_row+'">Price</label>   <input type="text" name="v_price'+counter_row+'" id="v_price'+counter_row+'" class="form-control"> </div> </div> ' +
                        //     '   <div class="col-md-4"> <br> <button type="button" class="btn btn-danger mt-2" id="DeleteRow">Remove</button> </div>' +
                        //     '   </div>';
                    //     var newformAdd = '<div class="row" id="variant-form${c}" style="display: none;">'+
                    //                             '<div class="col-md-12">'+
                    //             '<div class="row" id="variant_name">'+
                    //                 '<div class="col-md-4">'+
                    //                     '<div class="form-group">'+
                    //                         '<label for="">Variant Type</label>'+
                    //                         '<select name="attr_name[]" id="" class="form-control">'+
                    //                             '<option value="">Select</option>'+
                    //                             '@foreach ($variant_type as $variant)'+
                    //                                 '<option value="{{$variant->id}}">{{$variant->name}}</option>'+
                    //                             '@endforeach'+
                    //                         '</select>'+
                    //                     </div>
                    //                 </div>
                    //             </div>
                    //                 <div class="row" id="row">
                    //                     <div class="col-md-4" id="variant_data">
                    //                         <div class="form-group">
                    //                             <label for="">Variant Name</label>
                    //                             <select name="variant_name[]" id="" class="form-control">
                    //                                 <option value="">Select</option>
                    //                                 @foreach ($variants as $variant)
                    //                                     <option value="{{$variant->id}}">{{$variant->variant_name}}</option>
                    //                                 @endforeach
                    //                             </select>
                    //                         </div>
                    //                     </div>
                    //                     <div class="col-md-4">
                    //                         <div class="form-group">
                    //                             <label for="v_price">Price</label>
                    //                             <input type="text" name="variant_price[]" id="v_price" class="form-control">
                    //                         </div>
                    //                     </div>
                    //                 </div>
                    //             <div class="row">
                    //                 <div class="col-12 d-flex justify-content-end">
                    //                     <button type="button" class="btn btn-primary" id="addrow">Add More</button>
                    //                 </div>
                    //             </div> 
                    //             <div class="row">
                    //                 <div class="col-4">
                    //                     <button type="button" class="btn btn-primary" id="add_variant_form">Add More</button>
                    //                 </div>
                    //                 <div class="col-4">
                    //                     <button type="button" class="btn btn-danger" id="remove_variant_form">Remove</button>
                    //                 </div>
                    //             </div> 
                    //         </div>
                    //     '</div>';
                    //     $('#variant-form').append(newformAdd);
                    // });


                //     $("body").on("click", "#remove_variant_form", function () {
                //     $(this).parents("#variant-form").remove();
                //     // counter_row--;
                // })


                $(document).ready(function(){
                    $('#product_form').submit(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: $(this).attr('action'),
                            type: "POST",
                            data: new FormData(this),
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                $("p.error").remove();
                                if (data.status == "error") {
                                    jQuery.each(data.errors, function(key, val) {
                                        $("#" + key).after('<p class="small text-danger error">' + val[0] +'</p>');
                                    });
                                }
                                if (data.status == "success") {
                                    notification(data.status,data.message);
                                    return false;
                                }
                            },
                            error: function(data) {
                                console.log(data);
                                notification(data.status,data.message);
                            },
                        });
                    });

                    //  $('[data-toggle="tooltip"]').tooltip();   
            });

                // document.getElementById("videoUpload").onchange = function(event) {
                //   let file = event.target.files[0];
                //   let blobURL = URL.createObjectURL(file);
                //   $('#video_preview').html('<video width="340" height="200" controls src="'+ blobURL+'">Your browser does not support the video tag.</video>');
                // }
            </script>
        </x-slot>
</x-admin.app-layout>
