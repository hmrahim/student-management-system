@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-12 col-lg-12">

    <div class="panel ">
        <div class="panel-content">
            <h4 class="pull-left">Employe Salary Increment</h4>


            <a href="{{ route('view_salary') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Employe List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <form action="{{route('insert_salary',$data->id) }}" id="student_form" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="card pd-20 pd-sm-40">
                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Icrement Salary: <span style="color:red">*</span></label>
                        <input class="form-control" type="text" name="salary_increment" value="{{ (@$edit_data->name) }}"  placeholder=" Student Name">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Effected Date: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" autocomplete="off" type="text" id="effected_date" name="effected_date" value="{{ (@$edit_data->father_name) }}" placeholder="Father Name">
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
            $('#effected_date').datepicker();
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
                    "salary_increment": {
                        required: true,


                    },
                    "effected_date": {
                        required: true,


                    },

                }
                });










                });




    </script>

@endsection
