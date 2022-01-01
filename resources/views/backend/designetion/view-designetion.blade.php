@extends("layouts.backendLayouts")
@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">
            <div class="panel-content">
                <h4 class="pull-left">Designetion List</h4>
                <a href="{{ route('add_designetion') }}" class="btn btn-success btn-sm pull-right "><i class="fa fa-plus"></i> Add Designetion</a> <br>
            </div> <hr>
            <div class="panel-content">

                <div class="table-responsive">

                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($data as  $value )


                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->name }} </td>
                            <td>{{ $value->status==1? "active" : "inactive" }}</td>
                            <td>
                                <a href="{{ route('edit_designetion',$value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('delete_designetion',$value->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

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
