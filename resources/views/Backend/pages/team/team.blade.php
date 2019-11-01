@extends('Backend.master.master')
@section('content')
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Team Members</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{route('team')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf

                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Staff Name *</label>
                                                <input class="form-control" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">

                                            <div class="form-group ">
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
                                                {{--<input class="form-control" name="description" type="text" id="desc">--}}
                                            <textarea name="description" id="desc"></textarea>
                                            </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Add Team</button>


                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </form>

                    </div>

                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
            </div>

            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Team Members</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- /.row -->
                        <table id="user" class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th><i class="fa fa-image"></i></th>
                                <th>Staff Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($team as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{asset('images/team/'.$value->image)}}" width="80px"></td>
                                    <td>{{$value->name}}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>
                                        <a href="{{route('delete-team',$value->id)}}" onclick="return confirm('Confirm Delete?')"
                                           class="btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> </a>
                                        <a href="{{route('edit-team',$value->id)}}" class="btn btn-sm btn btn-primary"><i
                                                    class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>

@endsection

