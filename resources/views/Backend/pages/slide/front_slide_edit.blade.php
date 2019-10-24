@extends('Backend.master.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Update Slides</h5>

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

                        <form method="POST" action="{{route('slide-front-edit')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$slide->id}}">
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Heading</label>
                                                <input value="{{$slide->header}}" class="form-control" name="heading"
                                                       type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label for="short_description" class="control-label">Short
                                                    Description</label>
                                                <textarea name="short_description" class="form-control"
                                                          id="desc">{!! $slide->short_description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Image*(Use Large Size
                                                    Image)</label>
                                                <input type="file" class="form-control" name="front_slide">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="">Current Slide Image</label>
                                                <div class="container">
                                                    <div class="round-img">
                                                        <a href="#"><img class="fa-times-rectangle"
                                                                         src="{{asset('images/slides'.'/'.$slide->image)}}"
                                                                         width="200px"
                                                                         alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">


                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Slide</button>
                                <a class="btn btn-dark" href="{{route('slide-front')}}"><i class="fa fa-backward"></i>
                                </a>


                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </form>

                    </div>

                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
            </div>

            <!-- /.col -->
        </div>
    </div>

@endsection
