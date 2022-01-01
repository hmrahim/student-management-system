@extends("layouts.backendLayouts")

@section('content')

 <!--SEARCHING, ORDENING & PAGING-->
 <div class="row animated fadeInRight">
    <div class="col-sm-12">

        <div class="panel">

            <div class="panel-content">
                <h4 class="pull-left">Student List</h4>

            </div> <hr>

            <div class="panel-content">

                <div class="pannel-content" style="margin-bottom:40px">
                    <div class="row">
                        <div class="col-md-4"><h4 class="pull-left">Search Student</h4></div>

                    </div>

                    <form action="{{ route('insert_roll') }}" method="POST"  id="search_form">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Class</label>
                                <select name="class_id" id="class_id" class="form-control " >
                                    <option value="">Select Class</option>
                                    @foreach ($class as $cls )


                                    <option value="{{ $cls->id }}" >{{ $cls->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Year</label>
                                <select name="year_id" id="year_id" class="form-control" >
                                    <option value="">Select Year</option>
                                    @foreach ($year as $years )


                                    <option value="{{ $years->id }}" >{{ $years->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top:28px">
                               <p class="btn btn-info" id="click"> Search</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <style>
                                .display_none{
                                    display: none;
                                }
                            </style>
                            <div class="row display_none" id="roll-genarate">
                                <div class="col-md-12">
                                <table id="basic-table" class=" table  table-striped nowrap table-hover " cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th>ID NO</th>
                                        <th>CLASS</th>
                                        <th>NAME</th>

                                        <th>FATHER NAME</th>
                                        <th>MOTHER NAME</th>
                                        <th width="15%">ROLL</th>

                                    </tr >
                                    </thead>
                                    <tbody id="genarate-tr">
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group" style="margin-top:28px">
                                   <button class="btn btn-success" type="submit" name="submit">Genarate Roll</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <br>

            </div> <br>




        </div>
    </div>
</div>
<script type="text/javascript">
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
                    "roll[]": {
                        required: true,


                    },

               },

           });

           });




</script>
<script>
    $(document).on("click", "#click",function(){
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        if(year_id == ""){
            toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "rtl": false,
                        "positionClass": "toast-bottom-right",
                        "onclick": null,
                        "showDuration": 1000,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "swing",
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp"
                        }
                    Command: toastr["error"]("  <h4>Year field is required</h4>");
                    return false;
        }
        if(class_id == ""){
            toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "rtl": false,
                        "positionClass": "toast-bottom-right",
                        "onclick": null,
                        "showDuration": 1000,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "swing",
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp"
                        }
                    Command: toastr["error"]("  <h4>Class field is required</h4>");
                    return false;
        }
        $.ajax({
            url: "{{ route('get_student') }}",
            type: "get",
            data: {"year_id":year_id,"class_id":class_id},
            success:function(data){
                $("#roll-genarate").removeClass("display_none");
                    var html= "";
                     $.each(data,function(key,v){
                         html +=
                         "<tr>"+
                    "<td>"+key +"</td>"+
                    "<td>"+v.user.id_no+" <input type='hidden' name='student_id[]' value='"+v.student_id+"' name=''></td>"+
                    "<td>"+v.class_name.name+"</td>"+
                    "<td>"+v.user.name+"</td>"+
                    "<td>"+v.user.father_name+"</td>"+
                    "<td>"+v.user.mother_name+"</td>"+
                    "<td><input type='text' class='form-control' value='"+v.roll+"' name='roll[]' id=''></td>"+
                    "</tr>";




                });
                 html= $("#genarate-tr").html(html);



            }


        });




    });


</script>




<!--

@endsection
