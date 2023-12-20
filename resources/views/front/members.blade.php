@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['about'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['members']])

    <section id="our-team" class="padding_top half-section-alt teams-border">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="heading-title wow fadeInLeft" data-wow-delay="200ms"
                         style="visibility: visible; animation-delay: 200ms; animation-name: fadeInLeft;">
                        <span
                            class="defaultcolor text-center">{{ $settings['Translations']['members_ceos_title'] }}</span>
                        <h2 class="darkcolor font-normal bottom30 text-center">{{ $settings['Translations']['members_ceos_subtitle'] }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="200ms"
                     style="visibility: visible; animation-delay: 200ms; animation-name: fadeInRight;">
                    <p class="heading_space mt-n3 mt-sm-0 text-center">{{ $settings['Translations']['members_ceos_brief'] }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="ourteam-slider" class="owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1943px;">
                                @foreach($CEOs as $CEO)
                                    <div class="owl-item active" style="width: 277.5px;">
                                        <div class="item">
                                            <div class="team-box wow fadeInUp" data-wow-delay="150ms"
                                                 style="visibility: visible; animation-delay: 150ms; animation-name: fadeInUp;">
                                                <div class="image">
                                                    <img src="{{ Storage::url($CEO->image) }}" alt="">
                                                </div>
                                                <div class="team-content">
                                                    <h4 class="darkcolor">{{ $CEO->name('ar') }}</h4>
                                                    <p>{{ $CEO->job_description('ar') }}</p>
                                                    <p>{{ $CEO->email }}</p>
                                                    <p>عضوية رقم <span
                                                            class="darkcolor">#{{ $CEO->membership_number }}</span></p>
                                                    <p dir="ltr">{{ $CEO->phone }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button>
                            <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span>
                            </button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="padding" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading_space  wow fadeIn animated" data-wow-delay="300ms"
                     style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                    <h2 class="heading bottom30 darkcolor font-light2">
                        {{ $settings['Translations']['members_title'] }}
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-6 offset-md-3">
                        <p class="mb-0">
                            {{ $settings['Translations']['members_subtitle'] }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row equal-shadow-team">
                @foreach($members as $member)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pb-4">
                        <div class="team-box wow fadeIn" data-wow-delay="300ms"
                             style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                            <div class="image">
                                <img src="{{ Storage::url($member->image) }}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">{{ $member->name('ar') }}</h4>
                                <p dir="rtl">عضوية رقم <span class="darkcolor">#{{ $member->membership_number }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection
