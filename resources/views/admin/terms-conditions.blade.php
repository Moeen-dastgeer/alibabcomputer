<x-admin.app-layout>
    
    <x-slot name="title">Terms & Conditions</x-slot>
    <x-slot name="contentHeader">
        <div class="col-sm-6">
            <h1 class="m-0">Terms & Conditions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
            </ol>
        </div><!-- /.col -->
    </x-slot>
    <form action="/admin/terms-conditions" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
              <textarea id="summernote" name="term" class="form-control" value="">
                {!!$term->term_condition!!}
                  </textarea>  
                  <span class="text-danger">
                    @error('privacy')
                    {{$message}}
                    @enderror 
                  </span>  
            </div>
          <input type="hidden" name="id" value="{{$term->id}}">
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>

    </form>



    <x-slot name="footer">
    
    
    </x-slot>    


</x-admin.app-layout>