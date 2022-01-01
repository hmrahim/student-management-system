@extends("layouts.backendLayouts")

@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">

            <div class="panel-content">
                <h4 class="pull-left">View Employe Leave</h4>


                <a href="{{ route('add_employe_leave') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> add Employe Leave</a> <br>
            </div> <hr>



            <div class="panel-content">


                <div class="table-responsive">

                    <table id="basic-table" class="data-table table  table-striped nowrap table-hover " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            <th>Name</th>
                            <th>Id No</th>
                            <th>Purpose</th>
                            <th>Date</th>
                          
                            <th width="12%">Action</th>

                        </tr >
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($employe as  $value )

<strong></strong>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->user->name}} </td>
                            <td>{{ $value->user->id_no}} </td>
                            <td>{{ $value->purpose->name}} </td>
                            <td>{{ $value->start_date }} <strong>To</strong> {{$value->end_date }} </td>
                            
                            <td>
                                <a href="{{ route('edit_employe_leave',$value->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                               


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
