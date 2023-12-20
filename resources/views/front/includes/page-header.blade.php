<section id="main-banner-page" class="position-relative page-header service-header section-nav-smooth parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top_160 padding_bottom">
                    <h2 class="font-bold"
                        style="color: #C95A3D;">{{ $settings['Translations']['inner_pages_title'] }}</h2>
                    <h3 class="font-19 pb-4 pt-2 color-dark1 font-bold">{{ $settings['Translations']['inner_pages_subtitle'] }}</h3>
                </div>
            </div>
        </div>
        <div class="bgdefault  title-wrap mt-n5">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">
                        {{ $currentPage }}
                    </h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light text-bold">
                            <a href="{{ route('front.home') }}">
                                {{ $settings['Translations']['inner_pages_breadcrumbs_main'] }}
                            </a>
                        </li>
                        @yield('breadcrumbs')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
