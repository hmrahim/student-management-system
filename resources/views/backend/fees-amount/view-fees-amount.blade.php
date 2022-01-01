@extends("layouts.backendLayouts")
@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">
            <div class="panel-content">
                <h4 class="pull-left">Fees List</h4>
                <a href="{{ route('add_fees_amount') }}" class="btn btn-success btn-sm pull-right "><i class="fa fa-plus"></i> Add Fees Amount</a> <br>
            </div> <hr>
            <div class="panel-content">

                <div class="table-responsive">

                    <table id="basic-table" class="data-table table table-striped nowrap table-hover " cellspacing="0" width="80%">
                        <thead>
                        <tr >
                            <th>Sl</th>
                            <th>Name</th>

                            <th class="">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($year as  $value )


                        <tr >
                            <td>{{ $i }}</td>
                            <td>{{ $value->feesCategory->name }} </td>

                            <td >

                                <a href="{{ route('view_fees_amount_data',$value->fee_category_id) }}"  class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('edit_fees_amount_data',$value->fee_category_id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>


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
