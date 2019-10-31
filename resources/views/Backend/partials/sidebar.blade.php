<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="index.html" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">BLOGS</li>
                <li>
                    <a href="{{route('blog')}}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        EXPLORE
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li><a href="{{route('category')}}">Category</a></li>
                        <li><a href="{{route('author')}}">Author</a></li>
                        <li><a href="{{route('tags')}}">Tags</a></li>
                        <li><a href="{{route('blog')}}">Blogs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        THINGS TO DO
                        <i class="metismenu-state-icon pe-7s caret-left"></i>
                    </a>
                </li>
                <li>
                    <a href="tables-regular.html">
                        <i class="metismenu-icon pe-7s-car"></i>
                        TRAVEL
                    </a>
                </li>
                <li class="app-sidebar__heading">Slides</li>
                <li>
                    <a href="{{route('slide-front')}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Frotnpage Sliders
                    </a>
                </li>
                <li>
                    <a href="{{route('advertisement')}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Advertisement
                    </a>
                </li>
                <li class="app-sidebar__heading">Setting</li>
                <li>
                    <a href="{{route('setting-page')}}">
                        <i class="metismenu-icon pe-7s-settings">
                        </i>Setting
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Forms Layouts
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="metismenu-icon pe-7s-pendrive">
                        </i>Forms Validation
                    </a>
                </li>
                <li class="app-sidebar__heading">Charts</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>ChartJS
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
