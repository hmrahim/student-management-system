@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-12 col-lg-12">

    <div class="panel ">
        <div class="panel-content">
            @if (@$edit_data)
            <h4 class="pull-left">Update Employe Leave </h4>
            @else
            <h4 class="pull-left">Employe Leave Register</h4>

            @endif



            <a href="{{ route('view_leave') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Employe List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <form action="{{@$edit_data ? route('update_leave',$edit_data->id): route('insert_leave') }}" id="student_form" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="card pd-20 pd-sm-40">
                <div class="form-layout">
                  <div class="row mg-b-25">


                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label ">Select Employe: <span class="tx-danger" style="color:red">*</span></label>
                          <select name="employe_id"  class="form-control select2" data-placeholder="Select Gender">
                            <option label="Select Gender"></option>
                            @foreach ($employe as $value)


                            <option value="{{ $value->id }}"{{ @$edit_data->employe_id==$value->id ? "selected": "" }}>{{ $value->name }}</option>
                            @endforeach

                          </select>
                        </div>
                      </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Start Date: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" autocomplete="off" type="text" id="start_date" name="start_date" value="{{@$edit_data? date("m-d-Y",strtotime((@$edit_data->start_date))):"" }}" placeholder="Start Date">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">End Date: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" autocomplete="off" type="text" id="end_date" name="end_date" value="{{@$edit_data? date("m-d-Y",strtotime((@$edit_data->end_date))):"" }}" placeholder="End Date">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label ">Leave Purpose: <span class="tx-danger" style="color:red">*</span></label>
                          <select name="leave_purpose_id" id="leave_purpose_id"  class="form-control select2" data-placeholder="Select Gender">
                            <option label="Select Gender"></option>
                            @foreach ($leave_purpose as $leave)


                            <option value="{{ $leave->id }}"{{ @$edit_data->leave_purpose_id==$leave->id?"selected" : "" }}>{{ $leave->name }}</option>
                            @endforeach
                            <option value="0">New Purpose</option>

                          </select>
                          <input type="text" name="name" id="new_purpose" style="display:none" class="form-control" placeholder="Write Purpose">
                        </div>
                      </div><!-- col-4 -->








                  </div><!-- row -->
                  <br>

                  <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary mg-r-5">Submit Form</button>

                  </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
              </div><!-- card -->

        </div>
    </form>


    </div>

</div>
</div>

<script type="text/javascript">
         $(document).ready(function(){
            $('#start_date').datepicker();
            $('#end_date').datepicker();
                        $("#student_image").change(function(e){
                        var reader= new FileReader();
                        reader.onload= function(e){
                            $("#view_student_image").attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files[0]);


                    });

                    $("#student_form").validate({

                highlight: function(label) {
                    $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                success: function(label) {
                    $(label).closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                rules: {
                    "employe_id": {
                        required: true,


                    },
                    "start_date": {
                        required: true,


                    },
                    "end_date": {
                        required: true,


                    },
                    "leave_purpose_id": {
                        required: true,


                    },

                }
                });

                $(document).on("change","#leave_purpose_id",function(){
                    var leave_purpose_id= $("#leave_purpose_id").val();
                    if (leave_purpose_id==0) {
                        $("#new_purpose").show();


                    }else{
                        $("#new_purpose").hide();

                    }
                });


                });

    </script>

@endsection
