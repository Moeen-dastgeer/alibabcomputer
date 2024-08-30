 <x-app-layout>
     <x-slot name="title">General Settings</x-slot>
     <x-slot name="contentHeader">
         <div class="col-sm-6">
             <h1 class="m-0">Settings</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item active">General</li>
             </ol>
         </div><!-- /.col -->
     </x-slot>
     <x-slot name="footer">
         <script type="text/javascript">
            $(document).ready(function () {
                $('#general_settings').submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url:'{{url("admin/settings/general")}}',
                        type:'post',
                        data: $(this).serialize(),
                        beforeSend:function() {
                            $('#submited').html('<i class="fa fa-spinner fa-spin"></i>');
                            $('#submited').attr('disabled',true);
                        },
                        success:function(data){
                            $('#submited').html('Save');
                            $('#submited').attr('disabled',false); 
                        },
                        error:function(error){
                            $('#submited').html('Save');
                            $('#submited').attr('disabled',false);
                                toastr.error('Error');
                        }
                    });
                });
            });
        </script>
     </x-slot>
     <div class="row justify-content-center">
         <div class="col-md-12">
             <div class="card card-primary">
                 <div class="card-body">
                     <form metthod="POST" id="general_settings">
                         @CSRF
                         <input type="hidden" name="formname" value="general_settings">
                         <table class="table table-sm table-condensed table-borderless text-left">
                            <tr>
                                <td width="300">Start Date Type(<small>Show on frontend</small>)</td>
                                <td>
                                    <select name="start_date_type" id="start_date_type" class="form-control" required>
                                        <option value="1" selected {{ $general['start_date_type']=='1'?'selected':'' }}>Default Current Date</option>
                                        <option value="2" {{ $general['start_date_type']=='2'?'selected':'' }}>Custom Date</option>
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <td width="300">Start Date (<small>Show on frontend</small>)</td>
                                <td><input type="date" class="form-control" name="show_start_date"
                                     value="{{ $general['show_start_date'] }}" required>
                                 </td>
                            </tr>
                             <tr>
                                 <td>End Date (<small>Show on frontend</small>)</td>
                                 <td>
                                     <input type="date" class="form-control" name="show_end_date"
                                         value="{{ $general['show_end_date'] }}"
                                         required>
                                 </td>
                             </tr>
                             
                             <tr>
                                 <td width="300"></td>
                                 <td><button type="submit" class="btn btn-danger" id="submited">Save</button></td>
                             </tr>
                         </table>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
