@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['branches'] }}
    </li>
    <li class="breadcrumb-item hover-light text-bold">
        {{ $branch->title('ar') }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $branch->title('ar')])

    <!-- Services us -->
    <section id="our-services" class="padding_top padding_bottom_half bglight">
        <div class="container">
            <div class="row whitebox top15">
                <div class="col-lg-4 col-md-5">
                    <div class="image widget heading_space_half">
                        <img alt="SEO" src="{{ Storage::url($branch->image) }}"/>
                    </div>
                    <div class="col-12 px-0">
                        <div class="w-100">
                            <div class="full-map short-map heading_space_half">
                                <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0"
                                        marginwidth="0"
                                        src="{!! $branch->location !!}">
                                    <a href="https://www.maps.ie/distance-area-calculator.html"></a>
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="widget heading_space text-right">
                        <h4 class="text-capitalize defaultcolor bottom30">
                            {{ $settings['Translations']['need_help'] }}
                        </h4>
                        <div class="contact-table d-table bottom15">
                            <div class="d-table-cell cells mx-2">
                                <span class="icon-cell"><i class="fas fa-mobile-alt"></i></span>
                            </div>
                            <div class="d-table-cell cells px-3">
                                <p class="bottom0">
                                    {{ $branch->main_phone('ar') }} <span
                                        class="d-block">{{ $branch->secondary_phone('ar') }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="contact-table d-table bottom15">
                            <div class="d-table-cell cells">
                                <span class="icon-cell"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <div class="d-table-cell cells px-3">
                                <p class="bottom0">{{ $branch->address('ar') }}</p>
                            </div>
                        </div>
                        <div class="contact-table d-table">
                            <div class="d-table-cell cells">
                                <span class="icon-cell"><i class="far fa-clock"></i></span>
                            </div>
                            <div class="d-table-cell cells p-3">
                                <p class="bottom0">
                                    <span>{{ $branch->work_days('ar') }}</span>- {{ $branch->work_time('ar') }}
                                    <span class="d-block">{{ $branch->holiday('ar') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="widget heading_space_half text-center text-md-right">
                        <h3 class="defaultcolor font-normal bottom30">{{ $branch->title('ar') }}</h3>
                        {{ $branch->description('ar') }}
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link defaultcolor" data-toggle="collapse" href="#collapseOne">
                                            {{ $settings['Translations']['vision'] }}
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body text-right">
                                            <p>
                                                {{ $settings['About Page']['vision_section_body'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link defaultcolor" data-toggle="collapse"
                                           href="#collapseTwo">
                                            {{ $settings['Translations']['goals'] }}
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body text-right">
                                            <p>
                                                {{ $settings['About Page']['first_goal_body'] }}
                                            </p>
                                            <p>
                                                {{ $settings['About Page']['second_goal_body'] }}
                                            </p>
                                            <p>
                                                {{ $settings['About Page']['third_goal_body'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link defaultcolor" data-toggle="collapse"
                                           href="#collapseFour">
                                            {{ $settings['Translations']['achievements'] }}
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body text-right">
                                            <p>
                                                {{ $branch->achievements('ar') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link defaultcolor" data-toggle="collapse"
                                           href="#collapseFive">
                                            {{ $settings['Translations']['rates'] }}
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                                        <div class="card-body text-right">
                                            <p>
                                                {{ $branch->rates('ar') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services us ends -->

    @include('front.includes.contact-section')
@endsection
