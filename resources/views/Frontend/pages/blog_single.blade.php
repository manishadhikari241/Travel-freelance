@extends('Frontend.master.master')
@section('content')
<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries">
{{--{{$blog->images->take(-2)}}--}}
            <div class="col-md-12 col-lg-8 main-content">
                <img src="{{asset('images/blogs/'.$blog->images->first()->image)}}" alt="Image" class="img-fluid mb-5">
                <div class="post-meta">

                    <span class="mr-2"><b>March 15, 2018</b> </span>
                </div>
                <h1 class="mb-4">{{$blog->title}}</h1>

                @foreach($blog->tags as $value)
                <a class="category mb-5" href="#">{{$value->name}}</a>
                @endforeach

                <div class="post-content-body">
                    @php
                    $str=str_word_count($blog->description,2);
                    $arr=array_keys($str);
                    $length=sizeof($arr);
                    $text=substr($blog->description,0,$arr[ceil($length/2)]);
                    $text1=substr($blog->description,$arr[ceil($length/2)],$arr[$length-1]);
                    @endphp

                    {!! html_entity_decode($text) !!}
                    <br>
                    <div class="row mb-5">
                        @foreach($blog->images->take(-2) as $item)
                        <div class="col-md-6 mb-4">
                            <img src="{{asset('images/blogs/'.$item->image)}}" alt="Image placeholder" class="img-fluid">
                        </div>
                            @endforeach
                    </div>
                    {!! $text1 !!}

                </div>


                <div class="pt-5">
                    <b>Category:
                        <a href="#">{{$blog->categories->name}}</a>
                        Tags:
                        @foreach($blog->tags as $value)
                        <a href="#">#{{$value->name}}</a>
                            @endforeach
                    </b>
                </div>



            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                {{--<div class="sidebar-box search-form-wrap">--}}
                    {{--<form action="#" class="search-form">--}}
                        {{--<div class="form-group">--}}
                            {{--<span class="icon fa fa-search"></span>--}}
                            {{--<input type="text" class="form-control" id="s"--}}
                                   {{--placeholder="Type a keyword and hit enter">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="{{asset('images/author/'.$blog->authors->image)}}" alt="Image Placeholder" class="img-fluid">
                        <div class="bio-body">
                            <h2>{{$blog->authors->name}}</h2>
                            <p>{!! $blog->authors->description !!}</p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="{{asset('images/ghandruk.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="{{asset('images/blogs/abc.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="{{asset('images/ghandruk.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach($category as $value)
                        <li><a href="#">{{$value->name}}<span>{{count($value->blogs)}}</span></a></li>
                            @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach($tags as $value)
                        <li><a href="#">{{$value->name}}</a></li>
                            @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3 ">Related Post</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a href="#" class="a-block sm d-flex align-items-center height-md"
                   style="background-image: url({{url('images/pokhara.jpg')}}); ">
                    <div class="text">
                        <div class="post-meta">
                            <span class="category">Lifestyle</span>
                            <span class="mr-2">March 15, 2018 </span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        </div>
                        <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#" class="a-block sm d-flex align-items-center height-md"
                   style="background-image: url({{url('images/pokhara.jpg')}}); ">
                    <div class="text">
                        <div class="post-meta">
                            <span class="category">Travel</span>
                            <span class="mr-2">March 15, 2018 </span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        </div>
                        <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#" class="a-block sm d-flex align-items-center height-md"
                   style="background-image: url({{url('images/pokhara.jpg')}}); ">
                    <div class="text">
                        <div class="post-meta">
                            <span class="category">Food</span>
                            <span class="mr-2">March 15, 2018 </span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        </div>
                        <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>


</section>
<!-- END section -->


<!-- loader -->
{{--<div id="loader" class="show fullscreen">--}}
    {{--<svg class="circular" width="48px" height="48px">--}}
        {{--<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>--}}
        {{--<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"--}}
                {{--stroke="#f4b214"/>--}}
    {{--</svg>--}}
{{--</div>--}}
    @stop