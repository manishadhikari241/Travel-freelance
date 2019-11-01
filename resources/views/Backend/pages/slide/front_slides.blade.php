@extends('Backend.master.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Slides</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{route('slide-front')}} " enctype="multipart/form-data"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf

                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Heading</label>
                                                <input class="form-control" name="heading" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Image*(Use Large Size
                                                    Image)</label>
                                                <input type="file" class="form-control" name="front_slide">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Slide Link</label>
                                                <input type="text" class="form-control" name="link">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label for="short_description" class="control-label">Short
                                                    Description</label>
                                                <textarea name="short_description" class="form-control"
                                                          id="desc"></textarea></div>
                                        </div>




                                    </div>
                                    <div class="row">


                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Add Slide</button>


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
                        <h5 class="card-title">All Slides</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- /.row -->
                        <table id="example1" class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th><i class="fa fa-image"></i></th>
                                <th>Main Header</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($slides as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{asset('images/slides/'.$value->image)}}" width="100px"></td>
                                    <td>{{$value->header}}</td>
                                    <td>{!! $value->short_description !!}</td>
                                    <td>{{$value->link}}</td>
                                    <td>
                                        <a href="{{route('slide-delete',$value->id)}}"
                                           onclick="return confirm('Are you sure??')" class="btn btn-sm btn btn-danger"><i
                                                    class="fa fa-trash"></i> </a>
                                        <a href="{{route('slide-front-edit',$value->id)}}"
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
    <div class="modal" id="myModal">

    </div>
@endsection
