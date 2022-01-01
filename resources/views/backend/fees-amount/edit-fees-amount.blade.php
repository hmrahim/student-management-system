@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-8 col-lg-12">

    <div class="panel ">
        <div class="panel-content">
            @if (isset($edit_data))
            <h4 class="pull-left">Update Amount</h4>
            @else
            <h4 class="pull-left">Add Shift</h4>
            @endif


            <a href="{{ route('view_fees_amount') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Shift List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <div class="row ">

                <div class="col-md-12  pull-center ">
                    <form id="myform" action="{{ route('update_fees_amount_data',$edit_data[0]->fee_category_id) }}" method="POST">
                        @csrf

                    <div class="add-item">
                            <div class="row">

                                    <div class="col-md-5">
                                            <div class="form-group">
                                            <label for="">Amount Category</label>
                                            <select name="category" id="" class="form-control" data-placeholder="Choose Category">
                                                <option label="Choose Category"></option>
                                                @foreach ($fee as $fees)


                                                <option value="{{ $fees->id }}" {{ $fees->id ==$edit_data[0]->fee_category_id? "selected" : ""  }}>{{ $fees->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                {{ $errors->has("category")? $errors->first("catrgory"):"" }}
                                                @error("category")
                                                {{ "This field is required" }}

                                                @enderror
                                            </span>
                                        </div>


                                    </div>
                                </div>
                                <br>
                                @foreach ($edit_data as $edit)


                                <div class="delete-extra-item" id="delete-extra-item">
                            <div class="row">

                                    <div class=" col-md-5">
                                            <div class="form-group">
                                            <label for="">Student Class</label>
                                            <select name="class[]" id="" class="form-control" data-placeholder="Choose Class">
                                                <option label="Choose Class"></option>
                                                @foreach ($class as $classes)


                                                <option value="{{ $classes->id }}" {{ $classes->id == $edit->Class_id? "selected" : ""  }} >{{ $classes->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                {{-- {{ $errors->has("class[]")? $errors->first("class[]"):"" }} --}}
                                                @error("class[]")
                                                {{ "This field is required" }}

                                                @enderror
                                            </span>
                                        </div>

                                    </div>


                                    <div class="col-md-5">
                                        <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" name="amount[]" id="" class="form-control" value="{{ $edit->fees_amount }}">
                                        <span class="text-danger">
                                            {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                                            @error("amount[]")
                                            {{ "This field is required" }}

                                            @enderror
                                        </span>
                                    </div>
                                    </div>
                                    <div class="col-md-1" style="margin:0;padding:0;padding-top: 27px">
                                        <span id="remove" class="btn btn-danger addeventmore"><i class="fa fa-minus-circle"></i></span>
                                        <span id="add" class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    </div>



                            </div>
                                </div >
                            @endforeach
                </div>

                    <div class="form-row">
                        <button type="submit" class="btn btn-success ">submit</button>
                    </div>

            </form>

                    <br>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div style="visibility: hidden">
    <div class="add-extra-item" id="add-extra-item">
        <div class="delete-extra-item" id="delete-extra-item">

            <div class="row">

                <div class=" col-md-5">
                        <div class="form-group">
                        <label for="">Student Class</label>
                        <select name="class[]" id="" class="form-control" data-placeholder="Choose Class">
                            <option label="Choose Class"></option>
                            @foreach ($class as $classes)


                            <option value="{{ $classes->id }}">{{ $classes->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">


                        </span>
                    </div>

                </div>


                <div class="col-md-5">
                    <div class="form-group">
                    <label for="">Amount</label>
                    <input type="text" name="amount[]" id="" class="form-control" placeholder="Enter Amount">
                    <span class="text-danger">



                    </span>
                </div>
                </div>
                <div class="col-md-1" style="margin:0;padding:0;padding-top: 27px">
                    <span id="remove" class="btn btn-danger addeventmore"><i class="fa fa-minus-circle"></i></span>
                    <span id="add" class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
                </div>



        </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
       var counter = 0;
       $(document).on("click","#add",function(){
           var add_item = $("#add-extra-item").html();
           $(this).closest(".add-item").append(add_item)
           counter ++;
       });
       $(document).on("click","#remove",function(){



           $(this).closest("#delete-extra-item").remove();
           counter -= 0;
       });

    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#myform").validate({

highlight: function(label) {
    $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
},
success: function(label) {
    $(label).closest('.form-group').removeClass('has-error');
    label.remove();
},

rules: {
    "category": {
        required: true,


    },
    "class[]": {
        required: true,


    },
    "amount[]": {
        required: true,


    },
}
});
});


</script>
@endsection
