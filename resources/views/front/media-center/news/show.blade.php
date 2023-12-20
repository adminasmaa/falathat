@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $news->title('ar') }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['media_center_news_details']])

    <!-- Our Blogs -->
    <section id="our-blog" class="bglight padding_top padding_bottom_half">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="news_item shadow-equal">
                        <div class="image">
                            <img src="{{ Storage::url($news->image) }}" alt="Latest News" class="img-responsive">
                        </div>
                        <div class="news_desc text-center text-md-right">
                            <h3 class="text-capitalize font-normal darkcolor">
                                <a href="#!"> {{ $news->title('ar') }} </a></h3>
                            <ul class="meta-tags top20 bottom20">
                                <li><a href="#."><i
                                            class="fas fa-calendar-alt"></i>{{ \App\Models\Activity::DataFormat($news->created_at) }}
                                    </a></li>
                                <li><a href="#."> <i class="far fa-user"></i> {{ $news->author('ar') }} </a></li>
                                <li><a href="#."><i
                                            class="far fa-comment-dots"></i>5 {{ $settings['Translations']['news_page_card_comments'] }}
                                    </a></li>
                            </ul>
                            {!! $news->description('ar') !!}
                            <div class="profile-authors heading_space">
                                <h4 class="text-capitalize darkcolor bottom40">{{ $settings['Translations']['comments'] }}</h4>
                                <div class="eny_profile bottom30">
                                    <div class="profile_photo"><img src="../images/CEO.jpg" alt="Comments"></div>
                                    <div class="profile_text bottom0">
                                        <h5 class="darkcolor"><a href="#.">محمد علي</a></h5>
                                        <!-- <a href="javascript:void(0)" class="readmorebtn font-bold"> <i class="fas fa-reply"></i> رد</a> -->
                                        <p class="top10 bottom0">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي
                                            الشكل وليس المحتوى) لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل
                                            وليس المحتوى)</p>
                                    </div>
                                </div>
                                <div class="eny_profile bottom30">
                                    <div class="profile_photo"><img src="../images/billgatesheadshot.jpg"
                                                                    alt="Comments"></div>
                                    <div class="profile_text bottom0">
                                        <h5 class="darkcolor"><a href="#."> احمد ياسر</a></h5>
                                        <!-- <a href="javascript:void(0)" class="readmorebtn font-bold"> <i class="fas fa-reply"></i> رد</a> -->
                                        <p class="top10 bottom0">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي
                                            الشكل وليس المحتوى) لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل
                                            وليس المحتوى)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comment">
                                <div class="text-center text-md-right">
                                    <h4 class="text-capitalize darkcolor"></h4>
                                    <p class="bottom20 top20"><small
                                            class="fas fa-asterisk"></small>{{ $settings['Translations']['add_comment_alert'] }}
                                    </p>
                                    <h5 class="pb-1">{{ $settings['Translations']['news_page_your_rate'] }} : <span
                                            id="ratingText"
                                            class="text-warning">{{ $settings['Translations']['news_page_select_rate'] }}</span>
                                    </h5>
                                    <ul class="comment top10 bottom30">
                                        <li><a href="javascript:void(0)" class="text-warning-hvr " id="rattingIcon">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form class="getin_form" id="post-a-comment">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group bottom35">
                                                <label for="first_name1" class="d-none"></label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ $settings['Translations']['add_comment_name_field'] }}"
                                                       required id="first_name1">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group bottom35">
                                                <label for="email1" class="d-none"></label>
                                                <input class="form-control" type="email"
                                                       placeholder="{{ $settings['Translations']['add_comment_email_field'] }}"
                                                       required id="email1">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group bottom35">
                                                <label for="message" class="d-none"></label>
                                                <textarea class="form-control"
                                                          placeholder="{{ $settings['Translations']['add_comment_message_field'] }}"
                                                          id="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 bottom5 text-sm-right text-center">
                                            <button type="submit"
                                                    class="button gradient-btn">{{ $settings['Translations']['add_comment_send_button'] }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <aside class="sidebar whitebox mt-5 mt-md-0">
                        <div class="widget shadow-equal heading_space_half text-center text-md-right" dir="ltr">
                            <h4 class="text-capitalize darkcolor bottom20">{{ $settings['Translations']['search'] }}</h4>
                            <form class="widget_search">
                                <div class="input-group">
                                    <label for="searchInput" class="d-none"></label>
                                    <input type="search" class="form-control text-right"
                                           placeholder="{{ $settings['Translations']['search'] }}..." required
                                           id="searchInput">
                                    <button type="submit" class="input-group-addon"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="widget heading_space_half shadow-equal wow fadeIn" data-wow-delay="350ms">
                            <h4 class="text-capitalize darkcolor bottom20 text-center text-md-right">{{ $settings['Translations']['latest_news'] }}</h4>
                            @foreach($latest_news as $single_news)
                                <div class="single_post d-table bottom15">
                                    <a href="{{ route('front.news.show', $single_news) }}" class="post"><img
                                            style="width: 50px;height: 54px;"
                                            src="{{ Storage::url($single_news->thumbnail) }}"
                                            alt="post image"></a>
                                    <div class="text text-right px-2">
                                        <a href="{{ route('front.news.show', $single_news) }}">{{ $single_news->title('ar') }}</a>
                                        <span>{{ \App\Models\Activity::DataFormat($single_news->created_at, true) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--Our Blog Ends-->

    @include('front.includes.contact-section')
@endsection
