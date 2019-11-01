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
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Title*</label>
                                                <input class="form-control" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <hr>
                                                <input type="checkbox" name="popular" value="popular">Popular<br>
                                                <input type="checkbox" name="featured" value="featured">Featured<br>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-4">

                                            <div class="form-group ">
                                                <label for="caption" class="control-label">Image*</label>
                                                <input class="form-control" name="image_upload[]" type="file" multiple
                                                       id="caption">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Tags*</label>
                                                <select class="form-control" id="tag" multiple name="tags[]">
                                                    @foreach($tag as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Category *</label>
                                                <select class="form-control" name="category">
                                                    <option selected>Select category</option>
                                                    @foreach($cat as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="name" class="control-label">Author</label>
                                            <select class="form-control" name="author">
                                                <option selected>Select author</option>
                                                @foreach($auth as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">SEO Keywords *</label>
                                                <input class="form-control" name="seo_key" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">SEO Description *</label>
                                                <input class="form-control" name="seo_description" type="text" id="name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label for="name" class="control-label">Blog Description*</label>
                                            <textarea id="desc"
                                                      name="description"
                                                      class="form-control"></textarea></div>
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


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">All Blogs</h5>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- /.row -->
                        <table id="example1" class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>SEO Keyword</th>
                                <th>SEO Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($blog as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{{$value->authors->name}}</td>
                                    <td>{{$value->categories->name}}</td>
                                    <td>
                                        @foreach($value->tags as $item)
                                            {{$item->name}},
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$value->seo_keyword}}
                                    </td>
                                    <td>
                                        {{$value->seo_description}}
                                    </td>
                                    <td>
                                        <a href="{{route('blog-delete',$value->id)}}" onclick="return confirm('Confirm Delete?')"
                                           class="btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> </a>
                                        <a href="{{route('blog-edit',$value->id)}}" class="btn btn-sm btn btn-primary"><i
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
@push('scripts')
<script>
    $(document).ready(function () {

        $('#tag').select2();

    });
</script>
    @endpush