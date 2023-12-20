@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['about'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['about']])

    <!--main page content-->
    <section class="main padding_top padding_bottom" id="main">
        <!--content-->
        <div class="blog-content">
            <div class="container" dir="ltr">
                <div class="row no-gutters">
                    <div class="col-12">
                        <!-- START HEADING SECTION -->
                        <div>
                            <div class="row no-gutters">
                                <div class="col-12 text-center wow slideInUp" data-wow-duration="2s">
                                    <!-- <p class="sub-heading text-center">Most flexible one page</p> -->
                                    <h1 class="heading fw-600">{{ $settings['About Page']['vision_section_title'] }}</h1>
                                    <p class="para_text my-2 mx-auto font-19">
                                        {{ $settings['About Page']['vision_section_body'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--content-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--main page content end-->

    <!-- Counters -->
    <section id="bg-counters" class="padding parallax bg-counters"
             style="background-image: url('{{ asset('front-assets/kids/images/7.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 113.829px;">
        <div class="bg-overlay bg-black opacity-4"></div>
        <div class="svg-message-top-holder">
            <div class="svg-message-top"></div>
        </div>
        <div class="container">
            <div class="row wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
                <div class="col-12">
                    <div class="parallax-text text-center wow slideInUp">
                        <h1 class="heading fw-600 text-white mb-3">{{ $settings['About Page']['message_section_title'] }}</h1>
                        <p class=" m-auto text-white font-19">
                            {{ $settings['About Page']['message_section_body'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main padding_top padding_bottom" id="main" dir="ltr">
        <!--content-->
        <div class="blog-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12">
                        <!-- START HEADING SECTION -->
                        <div class="standalone-detail">
                            <div class="row no-gutters">
                                <div
                                    class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2  text-center wow slideInUp"
                                    data-wow-duration="2s">
                                    <h1 class="heading">{{ $settings['About Page']['goals_section_title'] }}</h1></div>
                            </div>
                        </div>
                        <!--content-->
                        <div class="standalone-area">
                            <div class="row standalone-row align-items-center no-gutters">
                                <div class="col-lg-6">
                                    <div class="blog-image wow hover-effect fadeInLeft">
                                        <img src="{{ Storage::url($settings['About Page']['first_goal_image']) }}"
                                             alt="image">
                                    </div>
                                </div>
                                <div class="col-lg-6 stand-img-des">
                                    <div class="d-inline-block">
                                        <h2 class="gradient-text1"> {{ $settings['About Page']['first_goal_title'] }} </h2>
                                        <p class="para_text font-19"> {{ $settings['About Page']['first_goal_body'] }} </p>
                                    </div>
                                </div>
                            </div>

                            <!--content-->
                            <div class="row standalone-row align-items-center no-gutters">
                                <div class="col-lg-6 order-lg-2">
                                    <div class="blog-image wow hover-effect fadeInRight">
                                        <img src="{{ Storage::url($settings['About Page']['second_goal_image']) }}"
                                             alt="image">
                                    </div>
                                </div>
                                <div class="col-lg-6 stand-img-des">
                                    <div class="d-inline-block">
                                        <h2 class="gradient-text1"> {{ $settings['About Page']['second_goal_title'] }} </h2>
                                        <p class="para_text font-19"> {{ $settings['About Page']['second_goal_body'] }} </p>
                                    </div>
                                </div>
                            </div>

                            <!--content-->
                            <div class="row standalone-row align-items-center no-gutters">
                                <div class="col-lg-6">
                                    <div class="blog-image wow hover-effect fadeInLeft">
                                        <img src="{{ Storage::url($settings['About Page']['third_goal_image']) }}"
                                             alt="image">
                                    </div>
                                </div>
                                <div class="col-lg-6 stand-img-des">
                                    <div class="d-inline-block">
                                        <h2 class="gradient-text1"> {{ $settings['About Page']['third_goal_title'] }} </h2>
                                        <p class="para_text font-19"> {{ $settings['About Page']['third_goal_body'] }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--content-->
                        </div>
                        <!-- END HEADING SECTION -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="our-principles" class="padding bg-green" dir="ltr">
        <div class="svg-principles-top-holder">
            <div class="svg-principles-top"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms">
                        <span>{{ $settings['Principles Section']['principles_section_subtitle'] }}</span>
                        <h2 class="font-normal">{{ $settings['Principles Section']['principles_section_title'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <ul class="process-wrapp">
                    <li class="whitecolor wow fadeIn" data-wow-delay="300ms">
                        <span class="pro-step bottom20">01</span>
                        <p class="fontbold bottom20">{{ $settings['Principles Section']['first_principle_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Principles Section']['first_principle_brief'] }} </p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="400ms">
                        <span class="pro-step bottom20">02</span>
                        <p class="fontbold bottom20">{{ $settings['Principles Section']['second_principle_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Principles Section']['second_principle_brief'] }} </p>
                    </li>
                    <li class="whitecolor wow fadeIn active" data-wow-delay="500ms">
                        <span class="pro-step bottom20">03</span>
                        <p class="fontbold bottom20">{{ $settings['Principles Section']['third_principle_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Principles Section']['third_principle_brief'] }} </p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="600ms">
                        <span class="pro-step bottom20">04</span>
                        <p class="fontbold bottom20">{{ $settings['Principles Section']['fourth_principle_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Principles Section']['fourth_principle_brief'] }} </p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="700ms">
                        <span class="pro-step bottom20">05</span>
                        <p class="fontbold bottom20">{{ $settings['Principles Section']['fifth_principle_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Principles Section']['fifth_principle_brief'] }} </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="svg-principles-bottom-holder" style="bottom: 19px">
            <div class="svg-principles-bottom"></div>
        </div>

    </section>

    @include('front.includes.contact-section')
@endsection
