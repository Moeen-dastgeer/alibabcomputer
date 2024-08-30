<x-admin.app-layout>
    <x-slot name="title">Brand Update</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Brand Update</h1>
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
                    <h4>Brand Update</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('admin/brand/list') }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ url('admin/brand/edit') }}/{{ $brand->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
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
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="form-group">
                            <label>Description<span class="text-danger">*</span></label>
                            <textarea name="description" rows="8" class="form-control">{{ old('description',$brand->description) }}</textarea>
                        </div>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>        
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="disable"
                        {{ $brand->status == 'disable' ? 'checked' : '' }}>
                    <label class="form-check-label" for="disable">Disable</label>
                    <input type="radio" name="status" value="enable"
                        {{ $brand->status == 'enable' ? 'checked' : '' }}>
                    <label class="form-check-label" for="enable">Enable</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <x-slot name="footer">
            <script>
               let main_image_preloaded = [{
                    id: 1,
                    src: "{{ asset('storage/images/products/' . $brand->image) }}"
                }, ];
                $('#main_image').imageUploader({
                    imagesInputName: 'main_image',
                    preloaded: main_image_preloaded,
                    preloadedInputName: 'old_main_image',
                    maxFiles: 1
                });
            </script>
        </x-slot>
</x-admin.app-layout>
