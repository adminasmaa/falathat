@extends('front.layouts.app')

@section('styles')
    <style>
        figure {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            overflow: hidden;
        }

        figure:hover {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        figure:hover h1 {
            opacity: 0;
            transform: scale(0.7);

        }

        figure:hover img {
            transform: scale(1.25);
        }

        figure:hover figcaption {
            bottom: 0;
        }

        figure h1 {
            position: absolute;
            top: 50px;
            right: 20px;
            margin: 0;
            padding: 0;
            color: white;
            font-size: 25px;
            font-weight: 600;
            line-height: 1;
            opacity: 1;
            transform: scale(1);
            transition: 0.25s ease;
            z-index: 999;

        }

        figure .imageContainer {
            height: 100%;
            transition: 0.25s;
        }

        figure figcaption {
            position: absolute;
            bottom: -36%;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 30px;
            background-color: rgba(84, 142, 153, 0.85);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            color: white;
            line-height: 1;
            transition: 0.25s;
            text-align: right;
        }

        figure figcaption .userName {
            top: 7px;
            left: 0;
        }

        figure figcaption h3 {
            margin: 0 0 20px;
            padding: 0;
        }

        figure figcaption p {
            font-size: 14px;
            line-height: 1.75;
        }

        figure figcaption button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0 0;
            padding: 10px 30px;
            /* background-color: #1abc9c; */
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        figure .meta-tags {
            top: 90px;
            right: 15px;
            margin: 0;
            padding: 0;
            /* font-size: 11px; */
            font-weight: 100;
            line-height: 1;
            opacity: 1;
            transform: scale(1);
            transition: 0.25s ease;
            z-index: 999;
        }

        figure:hover .meta-tags {
            opacity: 0;
            transform: scale(0.7);

        }

        @media (max-width: 1200px) {
            figure figcaption {
                bottom: -39%;
            }
        }

        @media (max-width: 992px) {
            figure figcaption {
                bottom: -35%;
            }
        }

        @media (max-width: 768px) {
            figure figcaption {
                bottom: -31%;
            }
        }

        @media (max-width: 576px) {
            figure figcaption {
                bottom: -31%;
            }
        }

        @media (max-width: 462px) {
            figure figcaption {
                bottom: -35%;
            }
        }

        /* @media (max-width: 341px) {
            figure figcaption {
                bottom: -31%;
            }
        } */

    </style>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['media_center_activities'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['media_center_activities']])

    <section id="news_general" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center animated wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom45 darkcolor font-weight-normal"> {{ $settings['Translations']['media_center_activities'] }}
                        <span class="divider-center"></span></h2>
                </div>
            </div>
            <div class="row">
                @foreach($activities as $activity)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <figure class="image-block">
                            <h1>{{ $activity->title('ar') }}</h1>

                            <ul class="meta-tags position-absolute ">
                                <li>
                                    <a href="#." class="text-white"><i class="fas fa-calendar-alt mx-2"></i>
                                        {{ \App\Models\Activity::DataFormat($activity->created_at) }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.activities.show', $activity) }}" class="text-white">
                                        <i class="far fa-comment-dots mx-2"></i>
                                        8
                                        {{ $settings['Translations']['news_page_card_comments'] }}
                                    </a>
                                </li>
                            </ul>
                            <div class="imageContainer"
                                 style="background-image: url('{{ Storage::url($activity->thumbnail) }}');">
                                <div class="card-overlay"></div>
                            </div>
                            <!-- <img src="../images/image_375X500.jpg" alt="" /> -->
                            <figcaption>
                                <div class="position-relative">
                                    <h3>
                                        {{ $settings['Translations']['news_page_card_description'] }}
                                    </h3>
                                    <a href="#." class=" userName text-white position-absolute top"> <i
                                            class="far fa-user mx-2"></i> {{ $activity->author('ar') }} </a>
                                    <p>{{ Str::limit(strip_tags($activity->description('ar')), 100, ' ...') }}</p>
                                    <button class="button gradient-btn"
                                            onclick="window.location.href = '{{ route('front.activities.show', $activity) }}'">
                                        {{ $settings['Translations']['read_more_button'] }}
                                    </button>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

    <!--Customers Review Slider-->
    <section id="reviews" class="padding" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center animated wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom45 darkcolor font-weight-normal"> {{ $settings['Translations']['news_page_tweets_title'] }}
                        <span class="divider-center"></span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div id="testimonial-main-slider" class="owl-carousel">
                        <!--item 1-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/ceo.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">أحمد ياسر</a></h4>
                                <span class="defaultcolor font-11">Senior Front End Engineer</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 2-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار
                                        للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف
                                        بشكل عشوائي أخذتها من نص </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/billgatesheadshot.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">محمد فايز</a></h4>
                                <span class="defaultcolor font-11">Business Owner</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 3-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/WLT_A-Day-in-the-Life-of-Jeff-Bezos_w2xsjl-e1612343354223.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">محمد علي</a></h4>
                                <span class="defaultcolor font-11">Project Manager</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 4-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار
                                        للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف
                                        بشكل عشوائي أخذتها من نص </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/ceo.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">مؤمن</a></h4>
                                <span class="defaultcolor font-11">Business Analyst</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 5-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/billgatesheadshot.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">حسن</a></h4>
                                <span class="defaultcolor font-11">Back End Engineer</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 6-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/WLT_A-Day-in-the-Life-of-Jeff-Bezos_w2xsjl-e1612343354223.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">سفيان أحمد</a></h4>
                                <span class="defaultcolor font-11">Senior Data Scientist</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 7-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار
                                        للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف
                                        بشكل عشوائي أخذتها من نص </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/ceo.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">جود أحمد</a></h4>
                                <span class="defaultcolor font-11"><a href="#.">Software Engineer</a></span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--item 8-->
                        <div class="item">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                                        المحتوى) ويُستخدم في صناعات المطابع ودور النشر. </p>
                                </div>
                                <div class="testimonial-photo"><img alt=""
                                                                    src="{{ asset('front-assets/images/billgatesheadshot.jpg') }}">
                                </div>
                                <h4 class="darkcolor"><a href="#.">محمد أحمد</a></h4>
                                <span class="defaultcolor font-11">Software Archetict</span>
                                <div class="icon mt-2 testimonial-icon">
                                    <ul class="social-icons darkcolor">
                                        <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Customers Review-->

    @include('front.includes.contact-section')
@endsection
