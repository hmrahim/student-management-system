@extends("layouts.backendLayouts")

@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">

            <div class="panel-content">
                <h4 class="pull-left">Employe Salary Increment</h4>


                <a href="{{ route('view_salary') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Employe List</a> <br>
            </div> <hr>



            <div class="panel-content">


                <div class="table-responsive">
                    <h5><strong>Employe Name:</strong> {{ $details->name }} || <strong>Id No:</strong> {{ $details->id_no }}</h5>

                    <table id="basic-table" class="table table-striped nowrap table-hover " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="5%">Sl</th>

                            <th>Previous Salary</th>
                            <th>Increment Salary</th>
                            <th>Present Salart</th>
                            <th>Effected Date</th>


                        </tr >
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($selaray_details as  $value )


                        <tr>
                            <td>{{ $i }}</td>

                            <td>{{ $value->previous_salary}} </td>
                            <td>{{ $value->increment_salary}} </td>
                            <td>{{ $value->present_salary}} </td>
                            <td>{{ $value->effected_date}} </td>

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
