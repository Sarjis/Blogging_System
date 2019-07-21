<div class="hidden-top">
    <div class="hidden-top-inner container">
        <div class="row">
            <div class="span12">
                <ul>
                    <li><strong>We are available for any custom works this month</strong></li>
                    <li>Main office: Springville center X264, Park Ave S.01</li>
                    <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end toggle top area -->
<!-- start header -->
<header>
    <div class="container ">
        <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
            <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
        </div>
        <!-- end toggle link -->
        <div class="row nomargin">
            <div class="span12">
                <div class="headnav">
                    <ul>
                        <li><a href="{{route('/#/register')}}" data-toggle="modal"><i class="icon-user"></i> Register</a></li>
                        <li>
                            <router-link href="" :to="{path:'login#/'}" data-toggle="modal">Sign in</router-link>
                        </li>
                    </ul>
                </div>

                <!-- end reset modal -->
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <div class="logo">
                    <router-link :to="{path:'/'}"><img src="{{asset('/')}}front-end/img/logo.png" alt="" class="logo"/>
                    </router-link>
                    <h1>Flat and trendy bootstrap template</h1>
                </div>
            </div>
            <div class="span8">
                <div class="navbar navbar-static-top">
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="">
                                    <router-link :to="{path:'/'}">Home</router-link>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Blog Category <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $category)
                                            <li><a href="#">{{$category->category_name}}</a></li>
                                        @endforeach

                                        <li class="dropdown"><a href="#">3 Sliders <i class="icon-angle-right"></i></a>
                                            <ul class="dropdown-menu sub-menu-level1">
                                                @foreach($categories as $category)
                                                    <li><a href="#">{{$category->category_name}}</a></li>
                                                @endforeach>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Pages <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $category)
                                            <li><a href="#">{{$category->category_name}}</a></li>
                                        @endforeach


                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Portfolio <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="portfolio-2cols.html">Portfolio 2 columns</a></li>
                                        <li><a href="portfolio-3cols.html">Portfolio 3 columns</a></li>
                                        <li><a href="portfolio-4cols.html">Portfolio 4 columns</a></li>
                                        <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <router-link :to="{path:'/blog'}">Blog</router-link>
                                </li>
                                <li>
                                    <a href="contact.html">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end navigation -->
                </div>
            </div>
        </div>
    </div>
</header>