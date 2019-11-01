
@extends('Backend.master.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Team</h5>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form method="POST" action="{{route('edit-team')}}"
                      accept-charset="UTF-8" class=""
                      enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$team->id}}">
                    @csrf

                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group ">
                                        <label for="name" class="control-label">Staff Name *</label>
                                        <input class="form-control" name="name" value="{{$team->name}}" type="text" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-5">

                                    <div class="form-group ">
                                        <label for="caption" class="control-label">Current Image</label>
                                        <img src="{{url('images/team/'.$team->image)}}" width="60px"
                                             id="caption">
                                        <label for="caption" class="control-label">Image</label>
                                        <input class="form-control" name="image" type="file"
                                               id="caption">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                        <label for="name" class="control-label">Staff Description</label>
                                        <textarea name="description" id="desc">{{$team->description}}</textarea>

                                    </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Team</button>


                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </form>

            </div>

            <!-- ./card-body -->

            <!-- /.card-footer -->
        </div>
    </div>

@stop
