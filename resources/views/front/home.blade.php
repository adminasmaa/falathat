@extends('front.layouts.app')

@section('content')
    <!--MAIN SLIDER START-->
    <div id="slider-section" class="slider-section">
        <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0" dir="ltr">
            <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
            <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
                <ul>
                    @foreach($sliders->where('type', 0) as $slider)
                        @if($slider->position === \App\Models\Slider::RIGHT)
                            <li class="slider-bg-2" data-index="rs-02" data-transition="fade" data-slotamount="default"
                                data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-param1="02">
                                <!-- MAIN IMAGE -->
                                <div class="imageContainer"
                                     style="background-image: url('{{ Storage::disk('public')->url($slider->image) }}');">
                                    <div class="card-overlay"></div>
                                </div>
                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-resizeme" data-x="['right','right','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-90','-40','-35','-35']" data-width="none" data-height="none"
                                     data-type="text" data-textAlign="['center','center','center','center']"
                                     data-responsive_offset="on" data-start="1100"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <!-- <h2 class="font-15 font-xlight slider-top-text">The best toddler academy in town</h2> -->
                                </div>
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-resizeme" data-x="['right','right','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-25','20','20','20']" data-width="none" data-height="none"
                                     data-type="text"
                                     data-textAlign="['center','center','center','center']" data-responsive_offset="on"
                                     data-start="1100"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <h1 class="font-xlight font-60 slider-middle-text">
                                        @php $title = explode(' ', $slider->title('ar'));$onlyOneWord = count($title) === 1;$first_word = $title[0];array_shift($title); @endphp
                                        @if($onlyOneWord)
                                            <span class="redcolor"> {{ $first_word }} </span>
                                        @else
                                            <span class="bluecolor"> {{ implode(' ', $title) }} </span>
                                            <span class="redcolor"> {{ $first_word }} </span>
                                        @endif
                                    </h1>
                                </div>
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption tp-resizeme" data-x="['right','right','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['40','95','90','90']" data-width="none" data-height="none"
                                     data-type="text"
                                     data-textAlign="['right','right','center','center']" data-responsive_offset="on"
                                     data-start="1100"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <p class="text-capitalize font-19 text-white text-bold slider-top-text font-xlight">
                                        {!! $slider->brief('ar') !!}
                                    </p>
                                </div>
                                <!-- LAYER NR. 4 -->
                                @if($slider->link('ar'))
                                    <div class="tp-caption tp-resizeme" data-x="['right','right','center','center']"
                                         data-hoffset="['0','0','0','15']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['110','170','160','170']" data-width="none" data-height="none"
                                         data-whitespace="nowrap" data-type="text"
                                         data-textAlign="['center','center','center','center']"
                                         data-responsive_offset="on"
                                         data-start="1100"
                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                        <a href="{{ $slider->link('ar') }}" class="btn yellow-blue-btn rounded-pill">أعرف
                                            اكثر</a>
                                    </div>
                                @endif
                            </li>
                        @elseif($slider->position === \App\Models\Slider::MIDDLE)
                            <li data-index="rs-03" data-transition="fade" data-slotamount="default"
                                data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-param1="03">
                                <!-- MAIN IMAGE -->
                                <div class="imageContainer"
                                     style="background-image: url('{{ Storage::disk('public')->url($slider->image) }}');">
                                    <div class="card-overlay"></div>
                                </div>
                                <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-90','-40','-35','-35']" data-whitespace="nowrap"
                                     data-responsive_offset="on" data-width="['none','none','none','none']"
                                     data-type="text"
                                     data-textalign="['center','center','center','center']"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <!-- <h2 class="font-15 font-xlight slider-top-text">The best toddler academy in town</h2> -->
                                </div>

                                <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-25','20','20','20']" data-whitespace="nowrap"
                                     data-responsive_offset="on"
                                     data-width="['none','none','none','none']" data-type="text"
                                     data-textalign="['center','center','center','center']"
                                     data-fontsize="['48','48','20','26']"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <h1 class="font-xlight font-60 slider-middle-text">
                                        @php $title = explode(' ', $slider->title('ar'));$onlyOneWord = count($title) === 1;$first_word = $title[0];array_shift($title); @endphp
                                        @if($onlyOneWord)
                                            <span class="bluecolor"> {{ $first_word }} </span>
                                        @else
                                            <span class="redcolor"> {{ implode(' ', $title) }} </span>
                                            <span class="bluecolor"> {{ $first_word }} </span>
                                        @endif
                                    </h1>

                                </div>
                                <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['40','95','90','90']" data-whitespace="nowrap"
                                     data-responsive_offset="on"
                                     data-width="['none','none','none','none']" data-type="text"
                                     data-textalign="['center','center','center','center']"
                                     data-fontsize="['16','16','16','16']"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <p class="text-capitalize font-19 text-white text-bold slider-top-text font-xlight">
                                        {!! $slider->brief('ar') !!}
                                    </p>
                                </div>
                                @if($slider->link('ar'))
                                    <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                                         data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                         data-voffset="['110','170','160','170']" data-width="['500','500','500','500']"
                                         data-textalign="['center','center','center','center']" data-type="text"
                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                        <a href="{{ $slider->link('ar') }}" class="btn yellow-blue-btn rounded-pill">أعرف
                                            اكثر</a>
                                    </div>
                                @endif
                            </li>
                        @else
                            <li data-index="rs-01" data-transition="fade" data-slotamount="default"
                                data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-param1="01">
                                <!-- MAIN IMAGE -->
                                <div class="imageContainer"
                                     style="background-image: url('{{ Storage::disk('public')->url($slider->image) }}');">
                                    <div class="card-overlay"></div>
                                </div>
                                <div class="tp-caption tp-resizeme" data-x="['left','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-90','-40','-35','-35']" data-width="none" data-height="none"
                                     data-type="text" data-textAlign="['center','center','center','center']"
                                     data-responsive_offset="on" data-start="1100"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <!-- <h2 class="font-15 font-xlight slider-top-text">The best toddler academy in town</h2> -->
                                </div>
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-resizeme" data-x="['left','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-25','20','20','20']" data-width="none" data-height="none"
                                     data-type="text"
                                     data-textAlign="['center','center','center','center']" data-responsive_offset="on"
                                     data-start="1100"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <h1 class="font-xlight font-60 slider-middle-text">
                                        @php $title = explode(' ', $slider->title('ar'));$onlyOneWord = count($title) === 1;$first_word = $title[0];array_shift($title); @endphp
                                        @if($onlyOneWord)
                                            <span class="bluecolor"> {{ $first_word }} </span>
                                        @else
                                            <span class="redcolor"> {{ implode(' ', $title) }} </span>
                                            <span class="bluecolor"> {{ $first_word }} </span>
                                        @endif
                                    </h1>
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption tp-resizeme" data-x="['left','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['40','95','90','90']" data-width="none" data-height="none"
                                     data-type="text"
                                     data-textAlign="['left','center','center','center']" data-responsive_offset="on"
                                     data-start="1100"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <p class="text-capitalize font-19 text-white text-bold slider-top-text font-xlight">
                                        {!! $slider->brief('ar') !!}
                                    </p>
                                </div>
                                <!-- LAYER NR. 4 -->
                                @if($slider->link('ar'))
                                    <div class="tp-caption tp-resizeme" data-x="['left','center','center','center']"
                                         data-hoffset="['0','0','0','15']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['110','170','160','170']" data-width="none" data-height="none"
                                         data-whitespace="nowrap" data-type="text"
                                         data-textAlign="['center','center','center','center']"
                                         data-responsive_offset="on"
                                         data-start="1100"
                                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1100,"to":"o:1;","delay":0,"ease":"Power4.easeInOut"},{"delay":"wait","speed":0,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                        <a href="{{ $slider->link('ar') }}" class="btn yellow-blue-btn rounded-pill">أعرف
                                            اكثر</a>

                                    </div>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="svg-slider-bottom-holder">
            <div class="svg-slider-bottom"></div>
        </div>

        <ul class="social-icons social-icons-simple revicon white d-none d-md-block d-lg-block">
            <li class="d-table"><a href="{{ $settings['Communication Section']['communication_section_facebook'] }}"><i class="fab fa-facebook-f"></i></a></li>
            <li class="d-table"><a href="{{ $settings['Communication Section']['communication_section_twitter'] }}"><i class="fab fa-twitter"></i> </a></li>
            <li class="d-table"><a href="{{ $settings['Communication Section']['communication_section_linkedin'] }}"><i class="fab fa-linkedin-in"></i> </a></li>
            <li class="d-table"><a href="{{ $settings['Communication Section']['communication_section_instagram'] }}"><i class="fab fa-instagram"></i> </a></li>
        </ul>
    </div>
    <!--Main SLIDER END -->

    <!--Some Services-->
    <div class="container" style="min-height: 316px;">
        <div class="row">
            <div class="col-md-12">
                <div id="services-slider" class="owl-carousel">
                    @foreach($sliders->where('type', 1) as $secondary_slider)
                        <div class="item">
                            <div class="service-box bg-{{ $secondary_slider->color }}">
                                <span class="bottom25"><i class="fas fa-{{ $secondary_slider->icon }}"></i></span>
                                <h4 class="bottom10 text-nowrap">
                                    <a href="javascript:void(0)" class="font-22">
                                        {{ $secondary_slider->title('ar') }}
                                    </a>
                                </h4>
                                <p>
                                    {{ $secondary_slider->brief('ar') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Some Services ends-->

    <!-- Testimonials -->
    <section id="our-testimonial" class="bglight padding_bottom">
        <div class="svg-testimonial-top-holder">
            <div class="svg-testimonial-top"></div>
        </div>
        <div class="parallax page-header testimonial-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <div class="heading-title wow fadeInUp padding_testi" data-wow-delay="300ms">
                            <h2 class="whitecolor font-normal">{{ $settings['Translations']['ceo_section_title'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel" id="testimonial-slider">
                <!--item 1-->
                <div class="item testi-box">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="testimonial-round d-inline-block">
                                <img src="{{ Storage::url($ceo->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12  text-center">
                            <p class="bottom15 testimional-para top15 w-50 ml-auto mr-auto">
                                {{ $ceo->job_description('ar') }}
                            </p>
                            <span class="d-inline-block test-star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <h4 class="defaultcolor font-light top15"><a href="#.">
                                    {{ $ceo->name('ar') }}
                                </a></h4>
                            <p>
                                {{ $settings['Translations']['ceo'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="svg-testimonial-bottom-holder">
            <div class="svg-testimonial-bottom"></div>
        </div>
    </section>
    <!--testimonials end-->

    <!-- WOrk Process-->
    <section id="our-process" class="padding bg-green">
        <div class="svg-process-top-holder">
            <div class="svg-process-top"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms">
                        <span> {{ $settings['Levels Section']['levels_section_subtitle'] }} </span>
                        <h2 class="font-normal"> {{ $settings['Levels Section']['levels_section_title'] }} </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="process-wrapp">
                    <li class="whitecolor wow fadeIn" data-wow-delay="300ms">
                        <span class="pro-step bottom20">01</span>
                        <p class="fontbold bottom20">{{ $settings['Levels Section']['first_level_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Levels Section']['first_level_brief'] }}</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="400ms">
                        <span class="pro-step bottom20">02</span>
                        <p class="fontbold bottom20">{{ $settings['Levels Section']['second_level_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Levels Section']['second_level_brief'] }}</p>
                    </li>
                    <li class="whitecolor wow fadeIn active" data-wow-delay="500ms">
                        <span class="pro-step bottom20">03</span>
                        <p class="fontbold bottom20">{{ $settings['Levels Section']['third_level_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Levels Section']['third_level_brief'] }}</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="600ms">
                        <span class="pro-step bottom20">04</span>
                        <p class="fontbold bottom20">{{ $settings['Levels Section']['fourth_level_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Levels Section']['fourth_level_brief'] }}</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="700ms">
                        <span class="pro-step bottom20">05</span>
                        <p class="fontbold bottom20">{{ $settings['Levels Section']['fifth_level_title'] }}</p>
                        <p class="mt-n2 mt-sm-0">{{ $settings['Levels Section']['fifth_level_brief'] }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="svg-process-bottom-holder">
            <div class="svg-process-bottom"></div>
        </div>

    </section>
    <!--WOrk Process ends-->
    <!-- Mobile Apps -->
    <section id="our-apps" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="heading-title bottom30 wow fadeInLeft" data-wow-delay="200ms">
                        <!-- <span class="defaultcolor text-center text-md-left">Quisque tellus risus, adipisci viverra</span> -->
                        <h2 class="bottom30 darkcolor font-normal text-center text-md-left">
                            {{ $settings['Services Section']['services_section_title'] }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center" id="app-feature">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="text-center text-md-left">
                        <div class="feature-item mt-1 wow fadeInLeft" data-wow-delay="200ms">
                            <div class="icon">
                                <i class="fas fa-{{ $settings['Services Section']['first_service_icon'] }}"></i>
                            </div>
                            <div class="text">
                                <h4 class="bottom15">
                                    <span class="d-inline-block">
                                        {{ $settings['Services Section']['first_service_title'] }}
                                    </span>
                                </h4>
                                <p>
                                    {{ $settings['Services Section']['first_service_brief'] }}
                                </p>
                            </div>
                        </div>
                        <div class="feature-item mt-5 wow fadeInLeft" data-wow-delay="250ms">
                            <div class="icon">
                                <i class="fas fa-{{ $settings['Services Section']['second_service_icon'] }}"></i>
                            </div>
                            <div class="text">
                                <h4 class="bottom15">
                                    <span class="d-inline-block">
                                        {{ $settings['Services Section']['second_service_title'] }}
                                    </span>
                                </h4>
                                <p>
                                    {{ $settings['Services Section']['second_service_brief'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 text-center">
                    <div class="image feature-item d-inline-block wow fadeIn my-5 my-md-0" data-wow-delay="400ms">
                        <img src="{{ Storage::url($settings['Services Section']['services_section_image']) }}"
                             alt="mobile phones">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="text-center text-md-right">
                        <div class="feature-item mt-1 wow fadeInRight" data-wow-delay="200ms">
                            <div class="icon">
                                <i class="fas fa-{{ $settings['Services Section']['third_service_icon'] }}"></i>
                            </div>
                            <div class="text">
                                <h4 class="bottom15">
                                    <span class="d-inline-block">
                                        {{ $settings['Services Section']['third_service_title'] }}
                                    </span>
                                </h4>
                                <p>
                                    {{ $settings['Services Section']['third_service_brief'] }}
                                </p>
                            </div>
                        </div>
                        <div class="feature-item mt-5 wow fadeInRight" data-wow-delay="250ms">
                            <div class="icon">
                                <i class="fas fa-{{ $settings['Services Section']['fourth_service_icon'] }}"></i>
                            </div>
                            <div class="text">
                                <h4 class="bottom15">
                                    <span class="d-inline-block">
                                        {{ $settings['Services Section']['fourth_service_title'] }}
                                    </span>
                                </h4>
                                <p>
                                    {{ $settings['Services Section']['fourth_service_brief'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Mobile Apps ends-->

    <!-- Counters -->
    <section id="bg-counters" class="padding bg-counters bg-orange">
        <div class="svg-counter-top-holder">
            <div class="svg-counter-top"></div>
        </div>
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                    <div class="counters whitecolor  top10 bottom10">
                        <span class="count_nums font-light"
                              data-to="{{ $settings['Home Section']['we_started_since'] }}" data-speed="2500"> </span>
                    </div>
                    <h3 class="font-light whitecolor top20">{{ $settings['Translations']['we_started_since_text'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="kids-activity-holder">
                        <img src="{{ asset('front-assets/kids/images/falazat_ico_white.png') }}" alt="my paints image">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 bottom10">
                    <div class="counters whitecolor top10 bottom10">
                        <span class="count_nums font-light"
                              data-to="{{ $settings['Home Section']['children_in_classes'] }}"
                              data-speed="2500"> </span>
                    </div>
                    <h3 class="font-light whitecolor top20">{{ $settings['Translations']['children_in_classes_text'] }}</h3>
                </div>
            </div>
        </div>
        <div class="svg-counter-bottom-holder">
            <div class="svg-counter-bottom"></div>
        </div>
    </section>
    <!-- Counters ends-->

    <!-- Our Branches -->
    <section id="our-services" class="padding bglight">
        <div class="container">
            <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-normal"></span>
                    {{ $settings['Home Section']['branch_section_title'] }}
                    <span class="divider-center"></span>
                </h2>
                <div class="col-12">
                    <p class="mb-n3">
                        {{ $settings['Home Section']['branch_section_subtitle'] }}
                    </p>
                </div>
            </div>
            <div class="cardCustomDesign">
                <section class="articles">
                    @foreach($branches as $branch)
                        <article>
                            <div class="article-wrapper">
                                <figure>
                                    <img src="{{ Storage::url($branch->image) }}" alt=""/>
                                </figure>
                                <div class="article-body text-right">
                                    <h2>{{ $branch->title('ar') }}</h2>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($branch->description('ar')), 100, ' ...') }}
                                    </p>
                                    <a href="#!" class="read-more">
                                        {{ $settings['Translations']['know_more_button'] }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
            </div>
            <div class="col-12 d-flex justify-content-center p-5">
                <a class="button gradient-btn " href="{{ route('front.branches.index') }}">
                    {{ $settings['Translations']['know_more_button'] }}
                </a>
            </div>
        </div>
    </section>

    <!-- Counters -->
    <section id="bg-counters" class="padding pb-0 bg-counters bg-blue newsCenter">
        <div class="svg-counter-top-holder">
            <div class="svg-counter-top"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms"
                         style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <h2 class="font-normal heading_space_half">
                            {{ $settings['Home Section']['news_section_title'] }}
                        </h2>
                        <span class="whitecolor">
                            {{ $settings['Home Section']['news_section_subtitle'] }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4 col-sm-12">
                    <div class="widget p-4 heading_space_half shadow-equal wow fadeIn bg-light-blue "
                         data-wow-delay="350ms">
                        <h4 class="text-capitalize whitecolor bottom20 text-center text-md-right">{{ $settings['Translations']['latest_news'] }}</h4>
                        @foreach($latest_news as $news)
                            <div class="single_post d-table bottom15">
                                <a href="#." class="post"><img
                                        style="width: 50px;height: 54px;"
                                        src="{{ Storage::url( $news->thumbnail) }}"
                                        alt="post image"></a>
                                <div class="text text-right px-2">
                                    <a href="{{ route('front.news.index', $news) }}" class="text-white">{{ $news->title('ar') }}</a>
                                    <span class="text-white">{{ \App\Models\Activity::DataFormat($news->created_at) }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-8 col-sm-12" id="blog">
                    <article class="blog-item heading_space wow fadeIn text-center text-md-right" data-wow-delay="300ms"
                             style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                        <div class="image">
                            <img src="{{ Storage::url($latest_news->last()->thumbnail) }}"
                                 alt="blog"
                                 class="border_radius">
                        </div>
                        <h3 class="text-white font-light bottom10 top30">
                            <a href="#!">
                                {{ $latest_news->last()->title('ar') }}
                            </a>
                        </h3>
                        <ul class="commment">
                            <li>
                                <a href="#." class="text-white">
                                    <i class="fas fa-calendar px-1"></i>
                                    {{ \App\Models\Activity::DataFormat($latest_news->last()->created_at) }}
                                </a>
                            </li>
                            <li><a href="#." class="text-white"><i class="fas fa-comments px-1"></i> 19 تعليق</a></li>
                            <li>
                                <a href="#." class="text-white">
                                    <i class="fas fa-user px-1"></i>
                                    {{ $latest_news->last()->author('ar') }}
                                </a>
                            </li>
                        </ul>
                        <p class="top15 whitecolor">
                            {{ Str::limit(strip_tags($latest_news->last()->description('ar')), 150, ' ...') }}
                        </p>
                    </article>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center p-5">
                <a class="button gradient-btn " href="{{ route('front.news.index') }}">
                    {{ $settings['Translations']['know_more_button'] }}
                </a>
            </div>
        </div>
        <div class="svg-counter-bottom-holder">
            <div class="svg-counter-bottom"></div>
        </div>
    </section>
    <!-- Counters ends-->

    @include('front.includes.contact-section')
@endsection
