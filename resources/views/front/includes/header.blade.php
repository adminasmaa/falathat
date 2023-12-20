<!-- header -->
<header class="site-header" id="header">
    <nav class="navbar navbar-expand-lg transparent-bg static-nav ">
        <div class="container navbar-design">
            @if(auth()->guard('member')->check())
                <div class="navbar-user">
                    <img class="mx-2" src="{{ asset('front-assets/kids/images/CEO.jpg') }}" alt="Profile Logo">
                    <ul class="navbar-nav customNav">
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="{{ route('front.profile.index') }}"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false"> {{ auth()->guard('member')->user()->name_ar }} </a>
                            <div class="dropdown-menu text-right p-3">
                                <a class="dropdown-item" href="{{ route('front.profile.index') }}">
                                    <i class="fa fa-user blueColor" aria-hidden="true"></i>
                                    {{ $settings['Translations']['profile'] }}
                                </a>
                                <a class="dropdown-item" href="{{ route('front.logout') }}">
                                    <i class="fas fa-right-from-bracket blueColor"></i>
                                    {{ $settings['Translations']['logout'] }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
            <a class="navbar-brand mr-auto mr-lg-0" href="{{ route('front.home') }}">
                <img src="{{ asset('front-assets/kids/images/falazat_ico_white.png') }}" alt="logo"
                     class="logo-default">
                <img src="{{ asset('front-assets/kids/images/logo_فلذات_-removebg-preview.png') }}" alt="logo"
                     class="logo-scrolled">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link "
                           href="{{ route('front.about') }}">{{ $settings['Translations']['about'] }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="{{ route('front.members') }}">{{ $settings['Translations']['footer_members'] }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.home', ['#our-apps']) }}">
                            {{ $settings['Translations']['services'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#!">
                            {{ $settings['Translations']['subscriptions'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('front.branches.index') }}">
                            {{ $settings['Translations']['branches'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.media.center') }}">
                            {{ $settings['Translations']['media_center'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.committees.index') }}">
                            {{ $settings['Translations']['committee'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('front.jobs.index') }}">
                            {{ $settings['Translations']['jobs'] }}
                        </a>
                    </li>
                    @if(!auth()->guard('member')->check())
                        <li class="nav-item">
                            <a class="nav-link "
                               href="{{ route('front.login.create') }}">{{ $settings['Translations']['login'] }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span></span> <span></span> <span></span>
        </a>
        <div class="sticky-nav-bottom-holder-svg">
            <div class="svg-bottom"></div>
        </div>
    </nav>
    <!-- side menu -->
    <div class="side-menu opacity-0 bg-blue">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100" dir="rtl">
                <ul class="navbar-nav">
                    @if(auth()->guard('member')->check())
                        <li class="nav-item">
                            <a class="nav-link collapsePagesSideMenu collapsed" data-toggle="collapse"
                               href="#sideNavPages1" aria-expanded="false">
                                <img class="mx-2 my-2" src="{{ asset('front-assets/kids/images/CEO.jpg') }}"
                                     alt="Profile Logo">
                                {{ auth()->guard('member')->user()->name_ar }}
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages1" class="sideNavPages collapse">
                                <ul class="navbar-nav mt-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.profile.index') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            {{ $settings['Translations']['profile'] }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.logout') }}">
                                            <i class="fas fa-right-from-bracket"></i>
                                            {{ $settings['Translations']['logout'] }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('front.about') }}">
                            {{ $settings['Translations']['about'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('front.members') }}">
                            {{ $settings['Translations']['footer_members'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pagescroll" href="{{ route('front.home', ['#our-apps']) }}">
                            {{ $settings['Translations']['services'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#!">
                            {{ $settings['Translations']['subscriptions'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('front.branches.index') }}">
                            {{ $settings['Translations']['branches'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.jobs.index') }}">
                            {{ $settings['Translations']['jobs'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.media.center') }}">
                            {{ $settings['Translations']['media_center'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.committees.index') }}">
                            {{ $settings['Translations']['committee'] }}
                        </a>
                    </li>
                    @if(!auth()->guard('member')->check())
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('front.login.create') }}">
                                {{ $settings['Translations']['login'] }}
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple white top40">
                    <li><a href="javascript:void(0)" class="facebook"><i class="fab fa-facebook-f"></i> </a></li>
                    <li><a href="javascript:void(0)" class="twitter"><i class="fab fa-twitter"></i> </a></li>
                    <li><a href="javascript:void(0)" class="insta"><i class="fab fa-instagram"></i> </a></li>
                </ul>
                <p class="whitecolor">&copy; 2023 فلذات. Made With Love by Ahmed Yasser</p>
            </div>
        </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
</header>
<!-- header -->
