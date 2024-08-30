<x-admin.app-layout>
    <x-slot name="title">Brand</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Brand</h1>
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
                    <h4>Add new</h4>
                </div>

                <div class="col-md-6 text-right">
                    <a href="{{ url('/admin/brand/list') }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>

        <form action="{{ url('/admin/brand/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Main Image <span class="text-danger">*</span></label>
                                    <div id="main_image" style="padding-top: .5rem;"></div>
                                    <span class="text-danger">
                                        @error('main_image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="form-group col-md-6 col-sm-12">
                                <label>Status</label><br>
                                <input type="radio" id="disable" name="status" value="disable">
                                <label class="form-check-label" for="disable">Disable</label>
                                <input type="radio" id="enable" name="status" value="enable" checked>
                                <label class="form-check-label" for="enable">Enable</label>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
        </form>



        <x-slot name="footer">
            <script>
                $('#main_image').imageUploader({
                    imagesInputName: 'main_image',
                    maxFiles: 1
                });

                // $('#product_images').imageUploader({
                //     imagesInputName: 'product_images',
                //     maxFiles: 100
                // });

                // document.getElementById("videoUpload").onchange = function(event) {
                //   let file = event.target.files[0];
                //   let blobURL = URL.createObjectURL(file);
                //   $('#video_preview').html('<video width="340" height="200" controls src="'+ blobURL+'">Your browser does not support the video tag.</video>');
                // }
            </script>
        </x-slot>
</x-admin.app-layout>
