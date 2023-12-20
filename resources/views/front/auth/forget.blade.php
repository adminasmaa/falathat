@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['reset_password_page_title'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['reset_password_page_title']])

    <!-- sign-in -->
    <section id="sign-in" class="bglight position-relative padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">
                        {{ $settings['Translations']['reset_password_page_title'] }}
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-12 heading_space">
                        <p>
                            {{ $settings['Translations']['reset_password_page_subtitle'] }}
                        </p>
                    </div>
                    @if($errors->count())
                        <span class="alert alert-danger"
                              style="margin-top: 25px;">{{ $errors->first() }}</span>
                    @elseif(session()->has('status'))
                        <span class="alert alert-success"
                              style="margin-top: 25px;">{{ session()->get('status') }}</span>
                    @endif
                </div>
                <div class="col-lg-6 pl-lg-0 col-md-12 d-none d-lg-block">
                    <div class=" image login-image h-100">
                        <img src="{{ asset('front-assets/kids/images/1.jpg') }}" alt="" class="">
                    </div>
                </div>
                <div class="col-lg-6 pr-lg-0 col-md-12 whitebox noshadow">
                    <div class="widget logincontainer">
                        <h3 class="darkcolor bottom30  text-right">{{ $settings['Translations']['reset_password_page_form_title'] }}</h3>
                        <form class="getin_form border-form" id="login" action="{{ route('password.email') }}"
                              method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="loginEmail" class="d-none"></label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                               placeholder="{{ $settings['Translations']['reset_password_page_form_email_field'] }}"
                                               id="loginEmail">
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-center align-items-center flex-column">
                                    <div>
                                        <button type="submit" class="button gradient-btn">
                                            {{ $settings['Translations']['reset_password_page_form_continue_button'] }}
                                        </button>
                                        <a href="{{ route('front.login.create') }}" class="ml-2 defaultcolor">
                                            {{ $settings['Translations']['reset_password_page_form_back_to_login_button'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign-in ends -->
@endsection
