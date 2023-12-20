@extends('front.layouts.app')

@section('styles')
    <style>
        :root {
            --body-bg-color: #e5ecef;
            --theme-bg-color: #fafafb;
            --body-font: "Poppins", sans-serif;
            --body-color: #2f2f33;
            --active-color: #548E99;
            --active-light-color: #ededed;
            --header-bg-color: #fff;
            --search-border-color: #efefef;
            --border-color: #d8d8d8;
            --alert-bg-color: #e8f2ff;
            --subtitle-color: #83838e;
            --inactive-color: #f0f0f0;
            --placeholder-color: #9b9ba5;
            --time-button: #BB5F44;
            --level-button: #548E99;
            --button-color: #fff;
        }

        ::placeholder {
            color: var(--placeholder-color);
        }

        img {
            max-width: 100%;
        }


        .job {
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            overflow: hidden;
            /* background-color: var(--theme-bg-color); */
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 18px;
            cursor: pointer;
        }

        .logo svg {
            width: 24px;
            margin-right: 12px;
        }

        .user-settings {
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .user-settings svg {
            width: 20px;
            color: #94949f;
        }

        .user-menu {
            position: relative;
            margin-right: 8px;
            padding-right: 8px;
            border-right: 2px solid #d6d6db;
        }

        .user-menu:before {
            position: absolute;
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            border: 2px solid var(--header-bg-color);
            right: 6px;
            top: -1px;
            background-color: var(--active-color);
        }

        .user-profile {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            scroll-behavior: smooth;
            padding: 30px 40px;
            overflow: auto;
        }

        .main-container {
            display: flex;
            flex-grow: 1;
            padding-top: 30px;
        }

        .alert {
            background-color: var(--alert-bg-color);
            padding: 24px 18px;
            border-radius: 8px;
        }

        .alert-title {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .alert-subtitle {
            font-size: 13px;
            color: var(--subtitle-color);
            line-height: 1.6em;
            margin-bottom: 20px;
        }

        .alert input {
            width: 100%;
            padding: 10px;
            display: block;
            border-radius: 6px;
            background-color: var(--header-bg-color);
            border: none;
            font-size: 13px;
        }

        .search-buttons {
            border: none;
            color: var(--button-color);
            background-color: #8CB6BE;
            padding: 8px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 14px;
        }

        .job-wrapper {
            padding-top: 20px;
        }

        .job-time {
            padding-top: 20px;
        }

        .job-time-title {
            font-size: 14px;
            font-weight: 500;
        }

        .type-container {
            display: flex;
            align-items: center;
            color: var(--subtitle-color);
            font-size: 13px;
        }

        .type-container label {
            margin-left: 2px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .type-container + .type-container {
            margin-top: 10px;
        }

        .job-number {
            margin-left: auto;
            background-color: var(--inactive-color);
            color: var(--subtitle-color);
            font-size: 10px;
            font-weight: 500;
            padding: 5px;
            border-radius: 4px;
        }

        .job-style {
            display: none;
        }

        .job-style + label:before {
            content: "";
            margin-right: 10px;
            width: 16px;
            height: 16px;
            border: 1px solid var(--subtitle-color);
            border-radius: 4px;
            cursor: pointer;
        }

        .job-style:checked + label:before {
            background-color: var(--active-color);
            border-color: var(--active-color);
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'%3e%3cpath d='M20 6L9 17l-5-5'/%3e%3c/svg%3e");
            background-position: 50%;
            background-size: 14px;
            background-repeat: no-repeat;
        }

        .job-style:checked + label + span {
            background-color: var(--active-light-color);
            color: var(--active-color);
        }

        .searched-jobs {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding-left: 40px;
        }

        @keyframes slideY {
            0% {
                opacity: 0;
                transform: translateY(200px);
            }
        }

        .job-cards {
            padding-top: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: 25px;
            grid-row-gap: 25px;
            animation: slideY 0.6s both;
        }

        @media screen and (max-width: 1212px) {
            .job-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 930px) {
            .job-cards {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .job-card {
            padding: 20px 16px;
            background-color: var(--header-bg-color);
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .job-card:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 20px 2px rgba(0, 0, 0, 0.1);
        }

        .job-card img {
            width: 100px;
            padding: 10px;
            border-radius: 8px;
        }

        .job-card-title {
            font-weight: 600;
            margin-top: 16px;
            font-size: 14px;
        }

        .job-card-subtitle {
            color: var(--subtitle-color);
            font-size: 13px;
            margin-top: 14px;
            line-height: 1.6em;
            max-height: 100px;
            overflow-y: auto;
        }

        .job-card-header {
            display: flex;
            align-items: flex-start;
        }

        .detail-button {
            background-color: var(--active-light-color);
            color: var(--active-color);
            font-size: 11px;
            font-weight: 500;
            padding: 6px 8px;
            border-radius: 4px;
        }

        .detail-button + .detail-button {
            margin-left: 4px;
        }

        .job-card-buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 4px;
        }

        .card-buttons,
        .card-buttons-msg {
            padding: 10px;
            width: 100%;
            font-size: 12px;
            cursor: pointer;
            transition: all .4s ease-in-out;
        }

        .card-buttons:hover,
        .card-buttons-msg:hover {
            transform: scale(1.03);
        }

        .card-buttons {
            margin-left: 12px;
        }

        .card-buttons-msg {
            background-color: #fbe2d8;
            color: var(--subtitle-color);
        }

        .menu-dot {
            display: none;
            background-color: var(--placeholder-color);
            box-shadow: -6px 0 0 0 var(--placeholder-color), 6px 0 0 0 var(--placeholder-color);
            width: 4px;
            height: 4px;
            border: 0;
            padding: 0;
            border-radius: 50%;
            margin-right: auto;
            margin-left: 8px;
        }

        .modal-title {
            width: 100%;
            text-align: right;
        }

        .modal-footer {
            justify-content: flex-start;
        }
    </style>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['jobs'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['jobs']])

    <section id="vacancies" class="padding bglight">
        <div class="container-fluid">
            <div class="col-md-12 text-center  wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-normal"></span>
                    {{ $settings['Translations']['jobs_page_title'] }}
                    <span class="divider-center"></span>
                </h2>
                <!-- <div class="col-12">
                <p class="mb-n3">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر</p>
            </div> -->
            </div>
            <div class="job">
                <div class="wrapper">
                    <div class="main-container">
                        <div class="searched-jobs">
                            <div class="searched-bar">
                                <div class="searched-show">
                                    {{ $settings['Translations']['jobs_page_showing'] }}
                                    {{ $jobs->count() }}
                                    {{ $settings['Translations']['jobs_page_jobs'] }}
                                </div>
                                <!-- <div class="searched-sort">Sort by: <span class="post-time">Newest Post </span><span class="menu-icon">▼</span></div> -->
                            </div>
                            <div class="job-cards">
                                @foreach($jobs as $job)
                                    <div class="job-card">
                                        <div>
                                            <div class="job-card-header">
                                                <img
                                                    src="{{ asset('front-assets/images/logo_فلذات_-removebg-preview.png') }}"
                                                    alt="">

                                            </div>
                                            <div class="job-card-title text-right"> {{ $job->title('ar') }} </div>
                                            <div class="job-card-subtitle text-right">
                                                {{ $job->brief('ar') }}
                                            </div>
                                            <div class="job-detail-buttons text-right">
                                                @foreach(explode(',', $job->tags) as $tag)
                                                    <button class="search-buttons detail-button">{{ $tag }}</button>
                                                @endforeach
                                                <button class="search-buttons detail-button">
                                                    منذ {{ explode(' ', $job->created_at->diffForHumans())[0] }} ايام
                                                </button>
                                            </div>
                                        </div>
                                        <div class="job-card-buttons">
                                            <button class="search-buttons card-buttons" data-toggle="modal"
                                                    data-target="#applyJobModal">تقديم
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- upload Resume Modal -->
        <div class="modal fade" id="applyJobModal" tabindex="-1" role="dialog" aria-labelledby="applyJobModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">استمارة التقديم</h5>
                        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data"
                              method="POST">
                            <div class="row mt-3 fadeIn animated">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group ">
                                        <label for="fullName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="الأسم بالكامل:" required
                                               id="fullName">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group ">
                                        <label for="latinName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="الأسم بالأنجليزي:" required
                                               id="latinName">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group mb-0 ">
                                        <label for="phoneNumber" class="d-none"></label>
                                        <div class="d-flex justify-content-between">
                                            <input class="form-control" style="flex: 0 0 75%;" type="number"
                                                   placeholder="أضف رقم الجوال:" required id="phoneNumber">
                                            <input class="form-control" style="flex: 0 0 23%;" type="number"
                                                   placeholder="كود البلد:" required id="phoneNumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group ">
                                        <label for="loginEmail" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="البريد الالكتروني:"
                                               required
                                               id="loginEmail">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group ">
                                        <label for="datepicker" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="تاريخ الميلاد:" required
                                               name="datepicker" id="datepicker" lang="ar">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group  ">
                                        <select class="form-select form-control" required id="gender">
                                            <option selected>الجنس :</option>
                                            <option value="male">ذكر</option>
                                            <option value="female">أنثي</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="employer" class="d-none"></label>
                                        <textarea class="form-control" name="employer" id="employer" rows="5"
                                                  placeholder="العنوان "></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="employer" class="color-dark1 float-right">ارفق السيرة
                                            الذاتية</label>
                                        <input type="file" class="form-control" name="upload_resume" id="uploadResume">
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="search-buttons card-buttons bg-orange" data-dismiss="modal">اغلاق
                        </button>
                        <button type="button" class="search-buttons card-buttons bg-blue" id="applyBtn"
                                data-dismiss="modal">تقديم
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection
