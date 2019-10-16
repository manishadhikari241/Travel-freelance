@extends('Backend.master.master')
@section('content')
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 align="center">Add Blog</h3>
                    <hr>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{route('blog')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf

                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Title*</label>
                                                <input class="form-control" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group ">
                                                <label for="caption" class="control-label">Image*</label>
                                                <input class="form-control" name="image[]" type="file" multiple
                                                       id="caption">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Tags*</label>
                                                <select class="form-control" id="tag" multiple name="tag[]">
                                                    <option>--Select any category--</option>
                                                    <option>Explore</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Category *</label>
                                                <select class="form-control" name="category">
                                                    <option>--Select any category--</option>
                                                    <option>Explore</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label for="name" class="control-label">Blog Description*</label>
                                            <textarea id="desc"
                                                      name="description"
                                                      class="form-control"></textarea></div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="name" class="control-label">SEO Keywords *</label>
                                        <input class="form-control" name="key" type="text" id="name">
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="name" class="control-label">SEO Description *</label>
                                            <input class="form-control" name="seo_description" type="text" id="name">
                                        </div>
                                        </div>
                            </div>

                            <div>

                                <button type="submit" class="btn btn-primary">Add Blog</button>


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


                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                        {{--<h5 class="card-title">All Courses</h5>--}}

                        {{--<div class="card-tools">--}}

                            {{--<button type="button" class="btn btn-tool" data-widget="collapse">--}}
                                {{--<i class="fa fa-minus"></i>--}}
                            {{--</button>--}}
                            {{--<button type="button" class="btn btn-tool" data-widget="remove">--}}
                                {{--<i class="fa fa-times"></i>--}}
                            {{--</button>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.card-header -->--}}
                    {{--<div class="card-body">--}}

                        {{--<!-- /.row -->--}}
                        {{--<table id="user" class="table table-bordered table-sm">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Sn</th>--}}
                                {{--<th><i class="fa fa-image"></i></th>--}}
                                {{--<th>Course Name</th>--}}
                                {{--<th>Description</th>--}}
                                {{--<th>Action</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}

                            {{--@foreach($course as $key => $value)--}}
                                {{--<tr>--}}
                                    {{--<td>{{++$key}}</td>--}}
                                    {{--<td><img src="{{asset('images/courses/'.$value->image)}}" width="80px"></td>--}}
                                    {{--<td>{{$value->name}}</td>--}}
                                    {{--<td>{!! $value->description !!}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{{route('delete-course',$value->id)}}" onclick="return confirm('Confirm Delete?')"--}}
                                           {{--class="btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> </a>--}}
                                        {{--<a href="{{route('edit-course',$value->id)}}" class="btn btn-sm btn btn-primary"><i--}}
                                                    {{--class="fa fa-edit"></i> </a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}

                    {{--<!-- ./card-body -->--}}

                    {{--<!-- /.card-footer -->--}}
                {{--</div>--}}
            </div>
            <!-- /.col -->
        </div>
    </div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        $('#tag').select2();

    });
</script>
    @endpush