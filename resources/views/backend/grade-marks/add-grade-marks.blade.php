@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-12 col-lg-12">

    <div class="panel ">
        <div class="panel-content">
            @if (isset($edit_data))
            <h4 class="pull-left">Update Grade Marks</h4>

            @else
            <h4 class="pull-left">Add Grade Marks</h4>
            @endif


            <a href="{{ route('view.grade.point') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Grade Point List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <form action="{{ @$edit_data ? route('update.grade.point',$edit_data->id):route('insert.grade.point') }}" id="student_form" method="POST" enctype="multipart/form-data">
                @csrf


            <div class="card pd-20 pd-sm-40">
                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Grade Name: <span style="color:red">*</span></label>
                        <input class="form-control" type="text" name="grade_name" value="{{ (@$edit_data->grade_name) }}"  placeholder=" Grade Name">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Grade Point: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="grade_point" value="{{ (@$edit_data->grade_point) }}" placeholder="grade Point">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Start Marks: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="start_marks" value="{{ (@$edit_data->start_marks) }}"  placeholder="Start Marks">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">End Marks: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="end_marks" value="{{ (@$edit_data->end_marks) }}"  placeholder="End Marks">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Start Point: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="start_point" value="{{ (@$edit_data->start_point) }}" placeholder="Start Point">
                      </div>
                    </div><!-- col-4 -->





                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">End Point: <span class="tx-danger" style="color:red">*</span></label>
                          <input class="form-control" type="text" name="end_point"  value="{{ (@$edit_data->end_point) }}"  placeholder="End Point">
                        </div>
                      </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Remaeks: <span class="tx-danger" style="color:red">*</span></label>
                          <input class="form-control" type="text" name="remarks"  value="{{ (@$edit_data->remarks) }}"  placeholder="Remarks">
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
            $('#date_of_birth').datepicker();
            $('#join_date').datepicker();
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


                    "grade_name": {
                        required: true,


                    },
                    "grade_point": {
                        required: true,


                    },
                    "start_marks": {
                        required: true,


                    },
                    "end_marks": {
                        required: true,


                    },
                    "start_point": {
                        required: true,


                    },
                    "end_point": {
                        required: true,


                    },
                    "remarks": {
                        required: true,


                    },
                }
                });










                });




    </script>

@endsection
