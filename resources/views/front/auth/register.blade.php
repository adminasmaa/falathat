@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['registration_title'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['registration_title']])

    <!-- sign-in -->
    <section id="sign-in" class="bglight position-relative padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">
                        <span class="font-normal">{{ $settings['Translations']['registration_title'] }}</span>
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-12 heading_space">
                        <p>{{ $settings['Translations']['registration_subtitle'] }}</p>
                    </div>
                    @if($errors->count())
                        <span class="alert alert-danger"
                              style="margin-top: 25px;">{{ $errors->first() }}</span>
                    @endif
                </div>
                <div class="col-lg-6 pl-lg-0 col-md-12 d-none d-lg-block">
                    <div class=" image login-image h-100">
                        <img src="{{ asset('front-assets/kids/images/1.jpg') }}" alt="" class="">
                    </div>
                </div>
                <div class="col-lg-6 pr-lg-0 col-md-12 whitebox noshadow">
                    <div class="widget logincontainer">
                        <h3 class="darkcolor bottom30  text-right">{{ $settings['Translations']['registration_title'] }} </h3>
                        <form class="getin_form border-form" id="login" action="{{ route('front.register.store') }}"
                              method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerName" class="d-none"></label>
                                        <input class="form-control" type="text" name="name_ar" value="{{ old('name_ar') }}"
                                               placeholder="{{ $settings['Translations']['registration_form_name_field'] }}"
                                               id="registerName">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <select class="form-select form-control" name="type">
                                            <option
                                                selected>{{ $settings['Translations']['registration_form_type_field'] }}</option>
                                            <option {{ old('type') == 1 ? 'selected' : '' }}
                                                    value="1">{{ $settings['Translations']['registration_form_type_field_employee'] }}</option>
                                            <option {{ old('type') == 2 ? 'selected' : '' }}
                                                    value="2">{{ $settings['Translations']['registration_form_type_field_beneficiary'] }}</option>
                                            <option {{ old('type') == 3 ? 'selected' : '' }}
                                                    value="3">{{ $settings['Translations']['registration_form_type_field_nursery'] }}</option>
                                            <option {{ old('type') == 4 ? 'selected' : '' }}
                                                    value="4">{{ $settings['Translations']['registration_form_type_field_manager'] }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerEmail" class="d-none"></label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                               placeholder="{{ $settings['Translations']['registration_form_email_field'] }}"
                                               id="registerEmail">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerPass" class="d-none"></label>
                                        <input class="form-control" type="password" name="password"
                                               placeholder="{{ $settings['Translations']['registration_form_password_field'] }}"
                                               id="registerPass">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerPassConfirm" class="d-none"></label>
                                        <input class="form-control" type="password" name="password_confirmation"
                                               placeholder="{{ $settings['Translations']['registration_form_password_confirmation_field'] }}"
                                               id="registerPassConfirm">
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <div>
                                        <button type="submit" class="button gradient-btn w-100">
                                            {{ $settings['Translations']['registration_form_register_button'] }}
                                        </button>
                                        <p class="top20 log-meta"> {{ $settings['Translations']['registration_form_has_account'] }}
                                            &nbsp;<a href="{{ route('front.login.create') }}" class="defaultcolor">
                                                {{ $settings['Translations']['registration_form_login_button'] }}
                                            </a>
                                        </p>
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
