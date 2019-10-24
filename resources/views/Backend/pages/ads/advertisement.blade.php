
@extends('Backend.master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Post Advertisement</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{route('advertisement')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf

                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Link*</label>
                                                <input class="form-control" name="link" type="text" id="name">
                                            </div>
                                        </div>


                                        <div class="col-sm-5">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Banner</label>
                                                <input class="form-control" name="image" type="file"
                                                       id="caption">
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Advertisement</button>

                                </div>
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
                        <h5 class="card-title">All Advertisements</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- /.row -->
                        <table id="example1" class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th><i class="fa fa-image"></i></th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($ads as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <img src="{{asset('images/advertisement/'.$value->image)}}" width="80px">
                                    </td>
                                    <td>{{$value->link}}</td>
                                    <td>
                                        <a href="{{route('advertisement-delete',$value->id)}}"
                                           onclick="return confirm('Confirm Delete?')"
                                           class="btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> </a>
                                        <a href="{{route('advertisement-edit',$value->id)}}"
                                           class="btn btn-sm btn btn-primary"><i
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

@stop
