@extends('Backend.master.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Update Advertisement</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{route('advertisement-edit')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$ad->id}}">
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Link*</label>
                                                <input class="form-control" name="link" value="{{$ad->link}}" type="text" id="name">
                                            </div>
                                        </div>


                                        <div class="col-sm-5">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Banner</label>
                                                <input class="form-control" name="image" type="file"
                                                       id="caption">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="status" class="control-label">Current Banner</label>
                                                <img src="{{asset('images/advertisement/'.$ad->image)}}" width="100px">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Update Advertisement</button>
                                <a class="btn btn-dark" href="{{route('advertisement')}}"><i class="fa fa-backward"></i>
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
