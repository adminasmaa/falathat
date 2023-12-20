@extends('front.layouts.app')

@section('styles')
    <style>

        #UserProfile .a-box {
            display: inline-block;
            width: 240px;
            text-align: center;
        }

        #UserProfile .img-container {
            height: 230px;
            width: 200px;
            overflow: hidden;
            border-radius: 0px 0px 20px 20px;
            display: inline-block;
        }

        #UserProfile .img-container img {
            margin: 15%;
        }

        #UserProfile .inner-skew {
            display: inline-block;
            border-radius: 20px;
            overflow: hidden;
            padding: 0px;
            font-size: 0px;
            margin: 30px 0px 0px 0px;
            /* background: #c8c2c2; */
            height: 250px;
            width: 200px;
        }

        #UserProfile .text-container {
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
            padding: 90px 20px 20px 20px;
            border-radius: 20px;
            background: #fff;
            margin: -120px 0px 0px 0px;
            line-height: 19px;
            font-size: 14px;
        }

        #UserProfile .text-container h3 {
            margin: 20px 0px 10px 0px;
            color: #04bcff;
            font-size: 18px;
        }
    </style>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['profile'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['profile']])

    <section id="UserProfile" class="padding">
        <div class="container">
            <div class="row">
                <h2 class="d-none">Tabs</h2>
                <div class="col-md-12 col-sm-12">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link darkcolor" data-toggle="collapse" href="#UserDetails"> <i
                                        class="fa fa-user"></i>{{ $settings['Translations']['profile_information'] }}
                                </a>
                            </div>
                            <div id="UserDetails" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <form id="userDataForm" name="userDataForm">
                                        <div class="row mt-3 fadeIn animated">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="fullName" class="d-none"></label>
                                                    <input class="form-control" type="text"
                                                           placeholder="{{ $settings['Translations']['profile_form_name_field'] }}"
                                                           id="fullName">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="latinName" class="d-none"></label>
                                                    <input class="form-control" type="text"
                                                           placeholder="{{ $settings['Translations']['profile_form_name_in_english_field'] }}"
                                                           id="latinName">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="nationalId" class="d-none"></label>
                                                    <input class="form-control" type="number"
                                                           placeholder="{{ $settings['Translations']['profile_form_id_field'] }}"
                                                           id="nationalId">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-0 ">
                                                    <label for="phoneNumber" class="d-none"></label>
                                                    <div class="d-flex justify-content-between">
                                                        <input class="form-control" style="flex: 0 0 75%;" type="number"
                                                               placeholder="{{ $settings['Translations']['profile_form_phone_field'] }}"
                                                               id="phoneNumber">
                                                        <input class="form-control" style="flex: 0 0 23%;" type="number"
                                                               placeholder="{{ $settings['Translations']['profile_form_code_field'] }}"
                                                               id="phoneNumber">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="loginEmail" class="d-none"></label>
                                                    <input class="form-control" type="email"
                                                           placeholder="{{ $settings['Translations']['profile_form_email_field'] }}"
                                                           id="loginEmail">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="datepicker" class="d-none"></label>
                                                    <input class="form-control" type="text"
                                                           placeholder="{{ $settings['Translations']['profile_form_date_field'] }}"
                                                           name="datepicker" id="datepicker" lang="ar">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group  ">
                                                    <select class="form-select form-control" id="gender">
                                                        <option
                                                            selected>{{ $settings['Translations']['profile_form_sex_field'] }}
                                                        </option>
                                                        <option
                                                            value="0">
                                                            ذكر
                                                        </option>
                                                        <option
                                                            value="1">
                                                            أنثي
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="loginEmail" class="d-none"></label>
                                                    <input class="form-control" type="email"
                                                           placeholder="{{ $settings['Translations']['profile_form_currency_field'] }}"
                                                           id="currency">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="employer" class="d-none"></label>
                                                    <input class="form-control" type="text"
                                                           placeholder="{{ $settings['Translations']['profile_form_job_field'] }}"
                                                           id="employer">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="membershipNo" class="d-none"></label>
                                                    <input class="form-control" type="text"
                                                           placeholder="{{ $settings['Translations']['profile_form_membership_field'] }}"
                                                           id="membershipNo">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group  ">
                                                    <select class="form-select form-control" id="gender">
                                                        <option selected>
                                                            {{ $settings['Translations']['profile_form_type_field'] }}
                                                        </option>
                                                        <option value="1">
                                                            {{ $settings['Translations']['registration_form_type_field_employee'] }}
                                                        </option>
                                                        <option value="2">
                                                            {{ $settings['Translations']['registration_form_type_field_beneficiary'] }}
                                                        </option>
                                                        <option value="3">
                                                            {{ $settings['Translations']['registration_form_type_field_nursery'] }}
                                                        </option>
                                                        <option value="4">
                                                            {{ $settings['Translations']['registration_form_type_field_manager'] }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group ">
                                                    <label for="employer" class="d-none"></label>
                                                    <textarea class="form-control" name="employer" id="employer"
                                                              rows="5"
                                                              placeholder="{{ $settings['Translations']['profile_form_address_field'] }}"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--<div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link darkcolor" data-toggle="collapse"
                                   href="#ShareholderRelations"> <i
                                        class="fa fa-users"></i>{{ $settings['Translations']['profile_shareholder_relations'] }}
                                </a>
                            </div>
                            <div id="ShareholderRelations" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/pdf.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/word.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/text-file.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/pdf.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/pdf.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/word.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/text-file.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/pdf.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/word.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/text-file.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                                <div class="a-box">
                                                    <div class="img-container">
                                                        <div class="img-inner">
                                                            <div class="inner-skew">
                                                                <img src="../images/pdf.svg" width="140px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-container">
                                                        <h3>سياسات الجمعية</h3>
                                                        <div>
                                                            <button class="button gradient-btn"
                                                                    onclick="window.location.href = 'news-details.html'">
                                                                تنزيل <i class="fa fa-download" aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection
