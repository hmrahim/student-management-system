@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-8 col-lg-12">

    <div class="panel ">
        <div class="panel-content">

            <h4 class="pull-left"> Edit Assign Subject</h4>



            <a href="{{ route('view_assign_subject') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Subject List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <div class="row ">

                <div class="col-md-12  pull-center ">
                    <form id="myform" action="{{ route('update_assign_subject',$edit_data[0]->class_id) }}" method="POST">
                        @csrf

                    <div class="add-item">
                            <div class="row">

                                    <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="">Class Name</label>
                                            <select name="class" id="" class="form-control" data-placeholder="Choose Category">
                                                <option label="Choose Class"></option>
                                                @foreach ($class as $cls)


                                                <option value="{{ $cls->id }}" {{  $cls->id == $edit_data[0]->class_id ? "selected" : ""}}>{{ $cls->name }}</option>
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

                                @foreach ($edit_data as $edit )


                                <div class="delete-extra-item" id="delete-extra-item">
                            <div class="row">

                                    <div class=" col-md-3">
                                            <div class="form-group">
                                            <label for="">Subject Name</label>
                                            <select name="subject[]" id="" class="form-control" data-placeholder="Choose Class">
                                                <option label="Choose Class"></option>
                                                @foreach ($subject as $subjects)


                                                <option value="{{ $subjects->id }}" {{  $subjects->id == $edit->subject_id ? "selected" : ""}}>{{ $subjects->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                {{-- {{ $errors->has("class[]")? $errors->first("class[]"):"" }} --}}
                                                @error("subject[]")
                                                {{ "This field is required" }}

                                                @enderror
                                            </span>
                                        </div>

                                    </div>


                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="">Full Mark</label>
                                        <input type="text" name="full_mark[]" id="" class="form-control" value="{{ $edit->full_mark }}">
                                        <span class="text-danger">
                                            {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                                            @error("full_mark[]")
                                            {{ "This field is required" }}

                                            @enderror
                                        </span>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="">Pass Mark</label>
                                        <input type="text" name="pass_mark[]" id="" class="form-control"value="{{ $edit->pass_mark }}">
                                        <span class="text-danger">
                                            {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                                            @error("pass_mark[]")
                                            {{ "This field is required" }}

                                            @enderror
                                        </span>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="">Subjective Mark</label>
                                        <input type="text" name="subjective_mark[]" id="" class="form-control" value="{{ $edit->subjective_mark }}">
                                        <span class="text-danger">
                                            {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                                            @error("subjective_mark[]")
                                            {{ "This field is required" }}

                                            @enderror
                                        </span>
                                    </div>
                                    </div>
                                    <div class="col-md-1" style="margin:0;padding:0;padding-top: 27px">
                                        <span id="add" class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
                                        <span id="remove" class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                    </div>



                            </div>
                                </div>
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

                <div class=" col-md-3">
                        <div class="form-group">
                        <label for="">Subject Name</label>
                        <select name="subject[]" id="" class="form-control" data-placeholder="Choose Class">
                            <option label="Choose Class"></option>
                            @foreach ($subject as $subjects)


                            <option value="{{ $subjects->id }}">{{ $subjects->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            {{-- {{ $errors->has("class[]")? $errors->first("class[]"):"" }} --}}
                            @error("subject[]")
                            {{ "This field is required" }}

                            @enderror
                        </span>
                    </div>

                </div>


                <div class="col-md-2">
                    <div class="form-group">
                    <label for="">Full Mark</label>
                    <input type="text" name="full_mark[]" id="" class="form-control" placeholder="Enter Amount">
                    <span class="text-danger">
                        {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                        @error("full_mark[]")
                        {{ "This field is required" }}

                        @enderror
                    </span>
                </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label for="">Pass Mark</label>
                    <input type="text" name="pass_mark[]" id="" class="form-control" placeholder="Enter Amount">
                    <span class="text-danger">
                        {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                        @error("pass_mark[]")
                        {{ "This field is required" }}

                        @enderror
                    </span>
                </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label for="">Subjective Mark</label>
                    <input type="text" name="subjective_mark[]" id="" class="form-control" placeholder="Enter Amount">
                    <span class="text-danger">
                        {{-- {{ $errors->has("amount[]")? $errors->first("amount[]"):"" }} --}}

                        @error("subjective_mark[]")
                        {{ "This field is required" }}

                        @enderror
                    </span>
                </div>
                </div>
                <div class="col-md-1" style="margin:0;padding:0;padding-top: 27px">
                    <span id="add" class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span id="remove" class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
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
    "class": {
        required: true,


    },
    "subject[]": {
        required: true,


    },
    "full_mark[]": {
        required: true,


    },
    "pass_mark[]": {
        required: true,


    },
    "subjective_mark[]": {
        required: true,


    },
}
});
});


</script>
@endsection
