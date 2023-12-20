<footer id="site-footer" class="position-relative bg-orange padding_top">
    <div class="svg-footer-top-holder">
        <div class="svg-footer-top"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 ">
                <div class="footer_panel padding_bottom_half bottom20 text-center">
                    <a href="{{ route('front.home') }}" class="footer_logo bottom25"><img
                            src="{{ asset('front-assets/kids/images/falazat_ico_white.png') }}"
                            alt="MegaOne"></a>
                    <!-- <p class="whitecolor bottom25">ابتعد عن الأشخاص الذين يحاولون التقليل من شأن طموحاتك.</p> -->
                    <div class="d-table w-100 address-item whitecolor bottom25" dir="ltr">
                        <!-- <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span> -->
                        <p class="d-table-cell align-middle bottom0">
                            @foreach(explode('&', $settings['Communication Section']['communication_section_phone']) as $phone_key => $communcation_phone)
                                @if($phone_key === 0)
                                    {{ $communcation_phone }}
                                @endif
                            @endforeach
                            @foreach(explode('&', $settings['Communication Section']['communication_section_email']) as $email_key => $communcation_email)
                                <a class="d-block" href="mailto:{{ $communcation_email }}">
                                    @if($email_key === 0)
                                        {{ $communcation_email }}
                                    @endif
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 px-5">
                <div class="footer_panel d-flex flex-column bottom25 padding_bottom_half">
                    <!-- padding_bottom_half bottom20 pl-0 pl-lg-5 -->
                    <h3 class="whitecolor text-md-right text-center bottom25">{{ $settings['Translations']['footer_website_map'] }}</h3>
                    <div class="d-flex justify-content-between">
                        <ul class="links">
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="{{ route('front.home') }}">{{ $settings['Translations']['footer_main'] }}</a>
                            </li>
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="{{ route('front.jobs.index') }}">{{ $settings['Translations']['footer_jobs'] }}</a>
                            </li>
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="{{ route('front.news.index') }}">{{ $settings['Translations']['footer_latest_news'] }}</a>
                            </li>
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="#!">{{ $settings['Translations']['footer_privacy_policy'] }}</a>
                            </li>
                            </li>

                        </ul>
                        <ul class="links">
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="{{ route('front.members') }}">{{ $settings['Translations']['footer_members'] }}</a>
                            </li>
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="#!">{{ $settings['Translations']['footer_subscriptions'] }}</a>
                            </li>
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="{{ route('front.news.index') }}">{{ $settings['Translations']['footer_media_center'] }}</a>
                            </li>
                            <li class="text-right">
                                <i class="fa-solid mx-1 fa-caret-left" style="color: #ccc;"></i>
                                <a href="{{ route('front.committees.index') }}">{{ $settings['Translations']['footer_committee'] }}</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div
                    class="footer_panel d-flex flex-column bottom25 padding_bottom_half justify-content-sm-center align-items-sm-center">
                    <!-- padding_bottom_half bottom20 pl-0 pl-lg-5 -->
                    <h3 class="whitecolor text-right bottom25 ">{{ $settings['Translations']['footer_follow_us'] }}</h3>
                    <ul class="links ">
                        <li class="text-right">
                            <i class="fab fa-facebook-f mx-1 text-white"></i>
                            <a href="{{ $settings['Communication Section']['communication_section_facebook'] }}">
                                {{ $settings['Translations']['footer_facebook'] }}
                            </a>
                        </li>
                        <li class="text-right">
                            <i class="fab fa-twitter mx-1 text-white"></i>
                            <a href="{{ $settings['Communication Section']['communication_section_twitter'] }}">
                                {{ $settings['Translations']['footer_twitter'] }}
                            </a>
                        </li>
                        <li class="text-right">
                            <i class="fab fa-instagram mx-1 text-white"></i>
                            <a href="{{ $settings['Communication Section']['communication_section_instagram'] }}">
                                {{ $settings['Translations']['footer_instagram'] }}
                            </a>
                        </li>
                        <li class="text-right">
                            <i class="fab fa-linkedin-in mx-1 text-white"></i>
                            <a href="{{ $settings['Communication Section']['communication_section_linkedin'] }}">
                                {{ $settings['Translations']['footer_linkedin'] }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-6 bottom20 padding_bottom_half">
                <h3 class="whitecolor text-right bottom25 ">{{ $settings['Translations']['footer_address'] }}</h3>
                @foreach(explode('&', $settings['Communication Section']['communication_section_address']) as $communcation_address)
                    <p class="text-right text-white">
                        <i class="fas fa-map-marker-alt text-white"></i>
                        {{ $communcation_address }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</footer>
<a href="" class="floating-btn questionnareFloat">
        <span class="initial-icon">
            <i class="fa fa-comment-dots"></i>
        </span>
    <span class="hover-text">{{ $settings['Translations']['footer_opinion'] }}</span>
</a>

<a href="" class="floating-btn contactUsFloat">
        <span class="initial-icon">
            <i class="fa fa-phone"></i>
        </span>
    <span class="hover-text">{{ $settings['Translations']['footer_contact_us'] }}</span>
</a>
