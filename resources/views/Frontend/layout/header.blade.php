
<header class="site-navbar py-1" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-xl-2">
                <h1 class="mb-0"><a href="{{route('index')}}" class="text-black h2 mb-0">Travelers</a></h1>
            </div>
            <div class="col-10 col-md-8 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li class="active">
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        <li class="has-children">
                            <a href="destination.blade.php">Explore</a>
                            <ul class="dropdown">
                                @foreach($category as $value)
                                    <li class="{{$value->blogs->first()!=null?'has-children':''}}"><a href="#">{{$value->name}}</a>
                                        @if($value->blogs->first()!=null)
                                        <ul class="dropdown">
                                            <li><a href="{{route('blogs',$value->id)}}">{{$value->blogs->first()?$value->blogs->first()->title:'-'}}</a> </li>
                                        </ul>
                                            @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="has-children">
                            <a href="destination.blade.php">Things to do</a>
                            <ul class="dropdown">
                                <li><a href="#">Japan</a></li>
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">France</a></li>
                            </ul>
                        </li>
                        <li><a href="../about.blade.php">Travel News</a></li>
                        <li><a href="{{route('aobut')}}">About</a></li>
                        <li><a href="{{route('blogs')}}">Blog</a></li>

                        <li><a href="../contact.html">Contact</a></li>
                        <!-- <li><a href="booking.html">Book Online</a></li> -->
                    </ul>
                </nav>
            </div>

            <div class="col-6 col-xl-2 text-right">
                <div class="d-none d-xl-inline-block">
                    <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0"
                        data-class="social">
                        <li>
                            <a href="#" class="pl-0 pr-3 text-black"><span class="icon-tripadvisor"></span></a>
                        </li>
                        <li>
                            <a href="#" class="pl-3 pr-3 text-black"><span class="icon-twitter"></span></a>
                        </li>
                        <li>
                            <a href="#" class="pl-3 pr-3 text-black"><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
                        </li>

                    </ul>
                </div>

                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                            href="#" class="site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a></div>

            </div>

        </div>
    </div>

</header>
