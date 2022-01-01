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


                </div>


                <div class="pannel-content">


                        <div id="documentResult">
                          <script id="document-template" type="text/x-handlebars-template">
                            <table id="basic-table" class=" table  table-striped nowrap table-hover " cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    @{{{thsourch}}}
                                </tr >
                                </thead>
                                <tbody >
                                    @{{#each this }}
                                    <tr>
                                        @{{{tdsourch}}}

                                    </tr>
                                    @{{/each }}
                                </tbody>
                            </table>

                          </script>


                        </div>

                </div>

            </div> <br>




        </div>
    </div>
</div>
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
            url:"{{ route('get_student_regi_fee') }}",
            type:"get",
            data:{"year_id":year_id,"class_id":class_id},
            beforeSend:function(){

            },
            success:function(data){
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $("#documentResult").html(html);
                $('[data-toggle = "tooltip"]').tooltip();



            }
        });





    });


</script>




<!--

@endsection
