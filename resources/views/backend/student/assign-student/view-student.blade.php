@extends("layouts.backendLayouts")

@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">

            <div class="panel-content">
                <h4 class="pull-left">Student List</h4>
                <a href="{{ route('add_student') }}" class="btn btn-success btn-sm pull-right "><i class="fa fa-plus"></i> Add New Student</a> <br>

            </div> <hr>

            <div class="panel-content">

                <div class="pannel-content" style="margin-bottom:40px">
                    <div class="row">
                        <div class="col-md-4"><h4 class="pull-left">Search Student</h4></div>

                    </div>

                    <form action="{{ route('search_student') }}" method="GET"  id="search_form">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Class</label>
                                <select name="class" id="" class="form-control " >
                                    <option value="">Select Class</option>
                                    @foreach ($class as $cls )


                                    <option value="{{ $cls->id }}" {{ (@$class_id) == $cls->id ? "selected" : ""}}>{{ $cls->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Year</label>
                                <select name="year" id="" class="form-control" >
                                    <option value="">Select Year</option>
                                    @foreach ($year as $years )


                                    <option value="{{ $years->id }}" {{ (@$year_id) == $years->id ? "selected" : ""}}>{{ $years->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top:28px">
                               <button class="btn btn-success" type="submit" name="search"> Search</button>
                            </div>
                        </div>
                    </form>
                </div> <br>

            </div> <br>

            <div class="panel-content">


                <div class="table-responsive">
                    @if (@$search)
                    <table id="basic-table" class="data-table table  table-striped nowrap table-hover " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            <th>Name</th>
                            <th>ID NO</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Year</th>

                            <th>Image</th>
                            <th width="12%">Action</th>

                        </tr >
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($all_data as  $value )


                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->student->name }} </td>
                            <td>{{ $value->student->id_no }} </td>
                            <td>{{ $value->class_name->name }} </td>
                            <td>{{ $value->roll }} </td>
                            <td>{{ $value->year_name->name }} </td>

                            <td><img src="{{ asset($value->student->image) }}" alt="" width="70px" height="70px"></td>
                            <td>
                                <a href="{{ route('edit_designetion',$value->student_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('edit_designetion',$value->student_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete_designetion',$value->student_id) }}" id="delete" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a>


                            </td>

                        </tr>
                        @php($i++)
                        @endforeach





                        </tbody>
                    </table>

                    @else



                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            <th>Name</th>
                            <th>ID NO</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Year</th>

                            <th>Image</th>
                            <th width="12%">Action</th>

                        </tr >
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($all_data as  $value )


                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->student->name }} </td>
                            <td>{{ $value->student->id_no }} </td>
                            <td>{{ $value->class_name->name }} </td>
                            <td>{{ $value->roll }} </td>
                            <td>{{ $value->year_name->name }} </td>

                            <td><img src="{{ asset($value->student->image) }}" alt="" width="70px" height="70px"></td>
                            <td>
                                <a href="{{ route('edit_student',$value->student_id) }}"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('promotion_student',$value->student_id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                <a href="{{ route('details_student',$value->student_id) }}"  class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                            </td>

                        </tr>
                        @php($i++)
                        @endforeach





                        </tbody>
                    </table>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $("#search_form").validate({

highlight: function(label) {
    $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
},
success: function(label) {
    $(label).closest('.form-group').removeClass('has-error');
    label.remove();
},

rules: {
    "class": {
        required: true,


    },
    "year": {
        required: true,


    },


}
});

    });


</script>

<!--

@endsection
