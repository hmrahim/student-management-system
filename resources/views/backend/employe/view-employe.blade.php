@extends("layouts.backendLayouts")

@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">

            <div class="panel-content">
                <h4 class="pull-left">Employe List</h4>
                <a href="{{ route('add_employe') }}" class="btn btn-success btn-sm pull-right "><i class="fa fa-plus"></i> Add New Student</a> <br>

            </div> <hr>



            <div class="panel-content">


                <div class="table-responsive">

                    <table id="basic-table" class="data-table table  table-striped nowrap table-hover " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Salary</th>
                            <th>Join Date</th>
                            <th>Image</th>
                            <th width="12%">Action</th>

                        </tr >
                        </thead>
                        <tbody>
                            @php($i=1)


                            @foreach ($employe as  $value )


                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $value->name}} </td>
                            <td>{{ $value->mobile}} </td>
                            <td>{{ $value->addres}} </td>
                            <td>{{ $value->gender }} </td>
                            <td>{{ $value->sellery}} </td>
                            <td>{{ $value->join_date}} </td>

                            <td><img src="{{ asset($value->image) }}" alt="" width="70px" height="70px"></td>
                            <td>
                                <a href="{{ route('edit_employe',$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                               

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
