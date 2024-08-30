<x-admin.app-layout>
    <x-slot name="title">Update Product</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Update Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    @php
        $allimages = '';
        if ($images != null) {
            // $images = unserialize($product->images);
            foreach ($images as $img) {
                $ur1 = asset('storage/images/products/' . $img->images);
                $allimages .= "{id: '" . $img->id . "', src: '" . $ur1 . "'},";
            }
        }
    @endphp
    <div class="card card-white">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Update Product</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('admin/products/list') }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ url('admin/products/edit') }}/{{ $product->id }}" method="POST" id="product_form"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $product->name) }}">
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
                                        <option value="{{ $item->id }}"
                                            {{ $product->cat_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
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
                                    @foreach ($manufacturer as $manufac)
                                        <option value="{{ $manufac->id }}"
                                            {{ $product->manufac_id == $manufac->id ? 'selected' : '' }}>
                                            {{ $manufac->name }}</option>
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
                                    @foreach ($vendor as $vendor)
                                        <option value="{{ $vendor->id }}"
                                            {{ $product->vendor_id == $vendor->id ? 'selected' : '' }}>
                                            {{ $vendor->name }}</option>
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
                                <input type="number" name="price" id="price" class="form-control"
                                    value="{{ old('price', $product->price) }}">
                                {{-- <span class="text-danger">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </span> --}}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Price Discount</label>
                                <input type="number" name="price_discount" id="price_discount" class="form-control"
                                    value="{{ old('price_discount', $product->discount_price) }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Keywords</label>
                                <input type="text" name="keywords" id="keywords" class="form-control"
                                    value="{{ old('keywords', $product->keyword) }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Stock</label><br>
                                <input type="number" name="qty" id="qty" class="form-control"
                                    value="{{ old('qty', $product->qty) }}">
                            </div>
                        </div>
                        @if($variants_values_count > 0)
                            <div class="row" id="variant-form">
                                <div class="col-md-12">
                                    <div class="row" id="variant_name">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Variant Type</label>
                                                <select name="attr_name" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($variant_type as $variant)
                                                        <option value="{{ $variant->id }}"
                                                            {{ $variant_value->variant_type_id == $variant->id ? 'selected' : '' }}>
                                                            {{ $variant->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($variants_values as $item)
                                        <div class="row" id="row">
                                            <div class="col-md-4" id="variant_data">
                                                <div class="form-group">
                                                    <label for="">Variant Name</label>
                                                    <select name="variant_name[]" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @foreach ($variants as $variant)
                                                            <option value="{{ $variant->id }}" {{$item->variant_id==$variant->id?'selected':''}}>{{ $variant->variant_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="v_price">Price</label>
                                                    <input type="text" name="variant_price[]" id="v_price"
                                                        class="form-control" value="{{$item->price}}">
                                                    <input type="hidden" name="variant_id[]" value="{{$item->id}}">    
                                                </div>
                                            </div>
                                            <div class="col-md-4"> 
                                                <br> 
                                                <button type="button" class="btn btn-danger mt-2" id="DeleteRow" onclick="deleterow($(this),{{$item->id}})">Remove</button> 
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary" id="addrow">Add
                                                More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                <div class="form-group col-sm-12">
                    <label>Short Description<span class="text-danger">*</span></label>
                    <textarea name="short_des" id="short_des" class="form-control">{{ old('short_des', $product->short_desc) }}</textarea>
                    {{-- <span class="text-danger">
                    @error('short_des')
                        {{ $message }}
                    @enderror
                </span> --}}
                </div>
                <label>Long Description<span class="text-danger">*</span></label>
                <textarea id="long_des" name="long_des" class="form-control summernote">{{ old('long_des', $product->long_desc) }}</textarea>
                {{-- <span class="text-danger">
                @error('long_des')
                    {{ $message }}
                @enderror
            </span> --}}
                <div class="form-group">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="disable"
                        {{ $product->status == 'disable' ? 'checked' : '' }}>
                    <label class="form-check-label" for="disable">Disable</label>
                    <input type="radio" name="status" value="enable"
                        {{ $product->status == 'enable' ? 'checked' : '' }}>
                    <label class="form-check-label" for="enable">Enable</label>
                </div>
                <div class="form-check col-md-6 col-sm-12">
                    <input type="checkbox" name="feature" class="form-check-input" value="1"
                        {{ $product->featured == '1' ? 'checked' : '' }}>
                    <label class="form-check-label">Feature Product</label>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <x-slot name="footer">
        <script>
                $("#addrow").click(function () {
                    // var variants = $("#variant_data").html();
                        var newRowAdd =
                            '  <div class="row" id="row"> ' +
                            '   <div class="col-md-4" id="variant_data">'+  
                            '    <div class="form-group">'+
                                    '<label for="">Variant Name</label>'+
                                               ' <select name="variant_name_new[]" id="" class="form-control">'+
                                                    '<option value="">Select</option>'+
                                                    '@foreach ($variants as $variant)'+
                                                        '<option value="{{$variant->id}}">{{$variant->variant_name}}</option>'+
                                                    '@endforeach'+
                                                '</select>'+
                                            '</div>'+
                            '   </div>'+
                            '   <div class="col-md-4"> <div class="form-group">  <label for="v_price">Price</label>   <input type="text" name="variant_price_new[]" id="v_price" class="form-control"> </div> </div> ' +
                            '   <div class="col-md-4"> <br> <button type="button" class="btn btn-danger mt-2" id="DeleteRow" onclick="deleterow($(this))">Remove</button> </div>' +
                            '  </div>';
                        $('#variant_name').after(newRowAdd);
                });
                
                // $("body").on("click", "#DeleteRow", function () {

                //     $(this).parents("#row").remove();
                // })
                function deleterow(a,row=null)
                {
                    if(row==null)
                    {

                        a.parents("#row").remove();
                    }
                    else
                    {
                            $.ajax({
                                type:'GET',
                                url:'{{route("admin.delete_variant")}}',
                                data:{
                                    id:row
                                },
                                success:function(data){
                                    if(data.status == 'success')
                                    {
                                        a.parents("#row").remove();
                                        notification(data.status, data.message);
                                    }
                                    
                                }
                            });
                    }
                                        
                }


            let main_image_preloaded = [{
                id: 1,
                src: "{{ asset('storage/images/products/' . $product->image) }}"
            }, ];
            $('#main_image').imageUploader({
                imagesInputName: 'main_image',
                preloaded: main_image_preloaded,
                preloadedInputName: 'old_main_image',
                maxFiles: 1
            });
            let product_images_preloaded = [@php  echo $allimages; @endphp];
            $('#product_images').imageUploader({
                imagesInputName: 'product_images',
                preloaded: product_images_preloaded,
                preloadedInputName: 'old_product_images',
                maxFiles: 100
            });

            $(document).ready(function() {
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
                                    $("#" + key).after(
                                        '<p class="small text-danger error">' + val[0] +
                                        '</p>');
                                });
                            }
                            if (data.status == "success") {
                                notification(data.status, data.message);
                                return false;
                            }
                        },
                        error: function(data) {
                            notification(data.status, data.message);
                        },
                    });
                });
            });

            $('.delete-image').on('click', function() {
                var id = $(this).next().val();
                $.ajax({
                    url: '/admin/image_delete/' + id,
                    method: "GET",
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status, data.message);
                        }
                    }
                });
            });
        </script>
    </x-slot>
</x-admin.app-layout>
