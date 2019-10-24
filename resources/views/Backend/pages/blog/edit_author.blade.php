@extends('Backend.master.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Author</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form method="POST" action="{{route('author-edit')}}"
                      accept-charset="UTF-8" class=""
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$find->id}}">

                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group ">
                                        <label for="name" class="control-label">Author Name *</label>
                                        <input class="form-control" name="name" type="text" id="name" value="{{$find->name}}">
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group ">

                                        <label for="status" class="control-label">Current Image:</label>
                                        <img src="{{asset('images/author/'.$find->image)}}" width="80px">
                                        <label for="status" class="control-label">Image</label>
                                        <input class="form-control" name="image" type="file"
                                               id="caption">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group ">
                                        <label for="name" class="control-label">Author Description *</label>
                                        <textarea id="desc"
                                                  name="description"
                                                  class="form-control">{{$find->description}}</textarea></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Author</button>

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

@endsection