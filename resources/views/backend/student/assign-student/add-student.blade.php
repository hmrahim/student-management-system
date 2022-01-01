@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-12 col-lg-12">

    <div class="panel ">
        <div class="panel-content">
            @if (isset($edit_data))
            <h4 class="pull-left">Update Student Information</h4>

            @else
            <h4 class="pull-left">Add New Student</h4>
            @endif


            <a href="{{ route('view_student') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Designetion List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <form action="{{ (@$edit_data) ? route("update_student",$edit_data->student_id) : route('insert_student') }}" id="student_form" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{(@$edit_data->id)}}">

            <div class="card pd-20 pd-sm-40">
                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Student Name: <span style="color:red">*</span></label>
                        <input class="form-control" type="text" name="student_name" value="{{ (@$edit_data->user->name) }}"  placeholder=" Student Name">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Father Name: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="father_name" value="{{ (@$edit_data->user->father_name) }}" placeholder="Father Name">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Mother Name: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="mother_name" value="{{ (@$edit_data->user->mother_name) }}"  placeholder="Mother Name">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Mobile No: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="phone" value="{{ (@$edit_data->user->mobile) }}"  placeholder="Mobile No">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Addres: <span class="tx-danger" style="color:red">*</span></label>
                        <input class="form-control" type="text" name="addres" value="{{ (@$edit_data->user->addres) }}" placeholder="Addres">
                      </div>
                    </div><!-- col-4 -->


                    <div class="col-lg-4">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label ">Gender: <span class="tx-danger" style="color:red">*</span></label>
                        <select name="gender"  class="form-control select2" data-placeholder="Select Gender">
                          <option label="Select Gender"></option>
                          <option value="Male" {{ (@$edit_data->user->gender == "Male" ? "selected" : "" ) }}>Male</option>
                          <option value="Female" {{ (@$edit_data->user->gender == "Female" ? "selected" : "" ) }}>Female</option>
                          <option value="3rd Gender" {{ (@$edit_data->user->gender == "3rd Gender" ? "selected" : "" ) }}>3rd Gender</option>

                        </select>
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Religion: <span class="tx-danger" style="color:red">*</span></label>
                        <select name="religion" class="form-control select2" data-placeholder="Choose Religion">
                          <option label="Choose Religion"></option>
                          <option value="Islam" {{ (@$edit_data->user->religion == "Islam" ? "selected" : "" ) }}>Islam</option>
                          <option value="Hindu" {{ (@$edit_data->user->religion == "Hindu" ? "selected" : "" ) }}>Hindu</option>
                          <option value="Khristan" {{ (@$edit_data->user->religion == "Khristan" ? "selected" : "" ) }}>Khristan</option>

                        </select>
                      </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Date Of Birth: <span class="tx-danger" style="color:red">*</span></label>
                          <input class="form-control" type="text" name="date_of_birth" id="date_of_birth" value="{{ (@$edit_data->user->date_of_birth) }}"  placeholder="Date Of Birth">
                        </div>
                      </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Discount: <span class="tx-danger" style="color:red">*</span></label>
                          <input class="form-control" type="text" name="discount" value="{{ (@$edit_data->discount->discount) }}"  placeholder="Discount">
                        </div>
                      </div><!-- col-4 -->
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Year: <span class="tx-danger" style="color:red">*</span></label>
                          <select name="year" class="form-control select2" data-placeholder="Choose Year">
                            <option label="Choose Year"></option>
                            @foreach ($year as $years )


                            <option value="{{ $years->id }}" {{ (@$edit_data->year_id == $years->id ? "selected" : "" ) }}>{{ $years->name }}</option>
                            @endforeach


                          </select>
                        </div>
                      </div><!-- col-4 -->  <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Class: <span class="tx-danger" style="color:red">*</span></label>
                          <select name="class" class="form-control select2" data-placeholder="Choose Class">
                            <option label="Choose Class"></option>
                            @foreach ($class as $classes )


                            <option value="{{ $classes->id }}" {{ (@$edit_data->class_id == $classes->id ? "selected" : "" ) }}>{{ $classes->name }}</option>
                            @endforeach

                          </select>
                        </div>
                      </div><!-- col-4 -->
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Group: </label>
                          <select name="group" class="form-control select2" data-placeholder="Choose Group">
                            <option label="Choose Group"></option>
                            @foreach ($group as $groups )


                            <option value="{{ $groups->id }}" {{ (@$edit_data->group_id == $groups->id ? "selected" : "" ) }}>{{ $groups->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div><!-- col-4 -->
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Shift: </label>
                          <select name="shift" class="form-control select2" data-placeholder="Choose Shift">
                            <option label="Choose Shift"></option>
                            @foreach ($shift as $shifts )


                            <option value="{{ $shifts->id }}" {{ (@$edit_data->shift_id == $shifts->id ? "selected" : "" ) }}>{{ $shifts->name }}</option>
                            @endforeach

                          </select>
                        </div>
                      </div><!-- col-4 -->
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Image: </label>
                         <input type="file" name="images" class="form-control" id="student_image">
                        </div>
                      </div><!-- col-4 -->
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <br>
                          <img src="{{ asset((@$edit_data)? $edit_data->user->image: 'backend/images/no-image.jpg') }}" alt="" style="border:1px solid #000" height="120px" width="100px" id="view_student_image">
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
                    "student_name": {
                        required: true,


                    },
                    "father_name": {
                        required: true,


                    },
                    "mother_name": {
                        required: true,


                    },
                    "phone": {
                        required: true,


                    },
                    "addres": {
                        required: true,


                    },
                    "gender": {
                        required: true,


                    },
                    "religion": {
                        required: true,


                    },
                    "date_of_birth": {
                        required: true,


                    },
                    "discount": {
                        required: true,


                    },
                    "year": {
                        required: true,


                    },
                    "class": {
                        required: true,


                    },
                }
                });








             

                });




    </script>

@endsection
