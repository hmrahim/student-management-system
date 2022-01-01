@extends("layouts.backendLayouts")
@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">

            <div class="panel-content">
                <h4 class="pull-left">Fees List</h4>



                <a href="{{ route('view_assign_subject') }}" class="btn btn-success btn-sm pull-right "><i class="fa fa-list"></i> View Subject List</a> <br>
            </div>
            <div class="panel-content">
                <h4 class="pull-left">Class Name : {{ $data[0]->class_name->name }}</h4>



               <br>
            </div>
            <hr>
            <div class="panel-content">

                <div class="table-responsive">


                    <table id="basic-table" class="data-table table table-striped nowrap table-hover " cellspacing="0" width="100%">

                        <thead>
                        <tr >
                            <th>Sl</th>
                            <th>Subject</th>
                            <th>Full Mark</th>
                            <th>Pass Mark</th>
                            <th>Subjective Mark</th>


                        </tr>
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($data as  $value )


                        <tr >
                            <td>{{ $i }}</td>
                            <td>{{ $value->subject_name->name }} </td>
                            <td>{{ $value->full_mark }} </td>
                            <td>{{ $value->pass_mark }} </td>
                            <td>{{ $value->subjective_mark }} </td>




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
