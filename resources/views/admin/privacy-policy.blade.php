<x-admin.app-layout>
    
    <x-slot name="title">Privacy & Policy</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Privacy & Policy</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    <form action="/admin/privacy-policy" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
              <textarea id="summernote" name="privacy" class="form-control" value="">
                {!!$privacy->privacy_policy!!}
                  </textarea>  
                  <span class="text-danger">
                    @error('privacy')
                    {{$message}}
                    @enderror 
                  </span>  
            </div>
          <input type="hidden" name="id" value="{{$privacy->id}}">
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>

    </form>

    


    <x-slot name="footer">
    
    
    </x-slot>
</x-admin.app-layout>


