@extends('Backend.master.master')
@section('content')
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 align="center">Edit Blog</h3>
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
                                                <input class="form-control" name="name" type="text" value="{{$blog->title}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <hr>
                                                <input type="checkbox" name="popular" value="popular">Popular<br>
                                                <input type="checkbox" name="not_popular" value="not_popular">Not popular<br>
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
                                                        <option {{\Illuminate\Support\Facades\DB::table('blog_tags')->where('blog_id',$blog->id)->where('tag_id',$value->id)->first() ? 'selected':''}}
                                                                value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Category *</label>
                                                <select class="form-control" name="category">
                                                    <option selected>Select category</option>
                                                    @foreach($category as $value)
                                                        <option @if($value->id==$blog->categories->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
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

                                                        <option @if($value->id==$blog->authors->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">SEO Keywords *</label>
                                                <input class="form-control" name="seo_key" type="text" value="{{$blog->seo_keyword}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">SEO Description *</label>
                                                <input class="form-control" name="seo_description" type="text" value="{{$blog->seo_description}}">
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
                                                      class="form-control">{{$blog->description}}</textarea></div>
                                    </div>


                                </div>

                                <div>

                                    <button type="submit" class="btn btn-primary">Update Blog</button>
                                    <a href="{{route('blog')}}" class=" btn btn-danger"><i class="fa fa-backward"></i>Back</a>


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

@stop
@push('scripts')
    <script>
        $(document).ready(function () {

            $('#tag').select2();

        });
    </script>
@endpush