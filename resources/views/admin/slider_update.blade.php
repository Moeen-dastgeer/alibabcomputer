<x-admin.app-layout>
    <x-slot name="title">Slider Update</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Slider Update</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>

    <div class="card card-white">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Slider Update</h4>
                </div>
                <div class="col-md-6 text-right">
                     <a href="{{ url('/admin/slider/list') }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ url('admin/slider/edit') }}/{{ $slider->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Main Image <span class="text-danger">*</span></label>
                    <div id="main_image" style="padding-top: .5rem;"></div>
                    <div class="text-danger clean" id="main_image_error"></div>
                </div>
                <div class="form-group col-sm-12">
                    <label>Introduction<span class="text-danger">*</span></label>
                    <input type="text" name="intro" class="form-control" value="{{old('intro',$slider->intro)}}">
                    <span class="text-danger">
                        @error('intro')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-sm-12">
                    <label>Title<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{old('title',$slider->title)}}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <input type="radio" name="status" value="disable"
                        {{ $slider->status == 'disable' ? 'checked' : '' }}>
                    <label class="form-check-label" for="disable">Disable</label>
                    <input type="radio" name="status" value="enable"
                        {{ $slider->status == 'enable' ? 'checked' : '' }}>
                    <label class="form-check-label" for="enable">Enable</label>
                </div>
            <!-- /.card-body -->
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

        <x-slot name="footer">
            <script>
                let main_image_preloaded = [{
                    id: 1,
                    src: "{{ asset('storage/images/products/' . $slider->image) }}"
                }, ];
                $('#main_image').imageUploader({
                    imagesInputName: 'main_image',
                    preloaded: main_image_preloaded,
                    preloadedInputName: 'old_main_image',
                    maxFiles: 1
                });

                $('.delete-image').on('click', function() {
                    var id = $(this).next().val();
                    $.ajax({
                        url: '/admin/image_delete/' + id,
                        method: "GET",
                        success: function(data) {
                            if (data.status == 'success') {
                                alert(data.message);
                            }
                        }
                    });


                });
            </script>
        </x-slot>
</x-admin.app-layout>
