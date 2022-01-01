@extends("layouts.backendLayouts")
@section('content')
<div class="condainer">
<div class="col-sm-12 col-md-8 col-lg-12">

    <div class="panel ">
        <div class="panel-content">
            @if (isset($edit_data))
            <h4 class="pull-left">Update Group</h4>
            @else
            <h4 class="pull-left">Add Group</h4>
            @endif


            <a href="{{ route('view_group') }}" style="float: right;" class="btn btn-primary btn-sm "> <i class="fa fa-list"></i> View Group List</a> <br>
        </div> <hr>
        <div class="panel-content ">
            <div class="row ">

                <div class="col-md-12 col-md-8 pull-center ">


                    <form class="form-horizontal" action="{{ (@$edit_data ) ? route('update_group_data',$edit_data->id) : route('insert_group_data')  }}" method="POST">
                        @csrf




                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Group Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ @$edit_data->name }}" class="form-control" id="name" placeholder="Enter Class Name">
                                <span style="color:red">
                                    {{ $errors->has("name")? $errors->first("name"):"" }}

                                </span>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ (@$edit_data?"Update" : "Submit") }}

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
