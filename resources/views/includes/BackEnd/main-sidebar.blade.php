<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"><i class="ti-palette"> {{ trans('main_trans.E-Commerce_list') }}</i>
                    </li>

                    <!-- menu item Categories-->
                    <li>
                        <a href="{{ route('categories.index') }}"><i class="fa fa-share-square-o"></i><span class="right-nav-text">{{ trans('main_trans.Categories') }}</span> </a>
                    </li>

                    <!-- menu item Products-->
                    <li>
                        <a href="{{ route('products.index') }}"><i class="fa fa-shopping-cart"></i><span class="right-nav-text">{{ trans('main_trans.Products') }}</span></a>
                    </li>

                    <!-- menu item Comments-->
                    <li>
                        <a href="{{ route('comments.index') }}"><i class="fa fa-comments-o"></i><span class="right-nav-text">{{ trans('main_trans.Comments') }}</span></a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"><i class="fa fa-user-circle-o"> {{ trans('main_trans.Users_Page') }}</i>
                    </li>

                    <!-- menu item Home-->
                    <li>
                        <a href="{{ route('home') }}"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main_trans.Home') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
