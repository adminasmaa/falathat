<!--begin::Header-->
<div id="kt_header" class="header">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-stack">
        <!--begin::Brand-->
        <div class="d-flex align-items-center me-5">
            <!--begin::Aside toggle-->
            <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3"
                 id="kt_aside_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="black"/>
                        <path opacity="0.3"
                              d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                              fill="black"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Aside  toggle-->
            <!--begin::Logo-->
            <a href="{{ route('dashboard.home') }}">
{{--                <img alt="Logo" src="#!" class="h-25px h-lg-30px"/>--}}
            </a>
            <!--end::Logo-->
            <!--begin::Nav-->
            <div class="ms-5 ms-md-10">
                <!--begin::Toggle-->
                <button type="button"
                        class="btn btn-flex btn-active-color-white align-items-cenrer justify-content-center justify-content-md-between align-items-lg-cenrer flex-md-content-between bg-white bg-opacity-10 btn-color-gray-500 px-0 ps-md-6 pe-md-5 h-30px w-30px h-md-35px w-md-200px"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                    <span class="d-none d-md-inline">Dashboard</span>
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                    <span class="svg-icon svg-icon-4 ms-md-4 me-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <path
                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Toggle-->
                <!--begin::Menu-->
                <div
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg fw-bold w-200px pb-3"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content fs-7 text-dark fw-bolder px-3 py-4">Select section:
                        </div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator mb-3 opacity-75"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('dashboard.users.index') }}" class="menu-link px-3">Admins</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Brand-->
        <!--begin::Topbar-->
        <div class="d-flex align-items-center flex-shrink-0">
            <!--begin::User-->
            <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                <!--begin::User info-->
                <div
                    class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3"
                    data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <!--begin::Name-->
                    <div
                        class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                        <span class="text-muted fs-8 fw-bold lh-1 mb-1">{{ auth()->user()->name }}</span>
                        <span
                            class="text-white fs-8 fw-bolder lh-1">{{ auth()->id() > 1 ? 'Admin' : 'Super Admin' }}</span>
                    </div>
                    <!--end::Name-->
                    <!--begin::Symbol-->
                    <div class="symbol symbol-30px symbol-md-40px">
                        <img
                            src="{{ !auth()->user()->avatar ? asset('assets/media/svg/avatars/blank.svg') : \Storage::url(auth()->user()->avatar) }}"
                            alt="image"/>
                    </div>
                    <!--end::Symbol-->
                </div>
                <!--end::User info-->
                <!--begin::User account menu-->
                <div
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <img alt="Logo"
                                     src="{{ !auth()->user()->avatar ? asset('assets/media/svg/avatars/blank.svg') : \Storage::url(auth()->user()->avatar) }}"/>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Username-->
                            <div class="d-flex flex-column">
                                <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                    <span
                                        class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ auth()->id() > 1 ? 'Admin' : 'Super Admin' }}</span>
                                </div>
                                <a href="#"
                                   class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                            </div>
                            <!--end::Username-->
                        </div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="{{ route('dashboard.profile') }}" class="menu-link px-5">
                            My Profile
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="{{ route('logout') }}"
                           class="menu-link px-5">Sign Out</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::User account menu-->
            </div>
            <!--end::User -->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
