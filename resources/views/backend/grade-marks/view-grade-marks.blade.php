@extends("layouts.backendLayouts")
@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">
            <div class="panel-content">
                <h4 class="pull-left">Grade Point List</h4>
                <a href="{{ route('add.grade.point') }}" class="btn btn-success btn-sm pull-right "><i class="fa fa-plus"></i> Add Grade Point</a> <br>
            </div> <hr>
            <div class="panel-content">

                <div class="table-responsive">

                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Grade Name</th>
                            <th>Grade Point</th>
                            <th>Start Marks</th>
                            <th>End Marks</th>
                            <th>Point Rang</th>
                            <th>Remarks</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($data as  $value )


                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->grade_name }} </td>
                            <td>{{ $value->grade_point }}</td>
                            <td>{{ $value->start_marks }}</td>
                            <td>{{ $value->end_marks }}</td>
                            <td>{{ $value->start_point}} To {{ $value->end_point}}</td>

                            <td>{{ $value->remarks }}</td>
                            <td>
                                <a href="{{ route('edit.grade.point',$value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                            </td>

                        </tr>
                        @php($i++)
                        @endforeach





                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--

@endsection
