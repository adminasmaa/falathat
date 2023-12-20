<!--begin::Aside-->
<div id="kt_aside" class="aside card" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid px-5">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 pe-4 me-n4" id="kt_aside_menu_wrapper"
             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
             data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="{lg: '75px'}">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded fw-bold fs-6" id="#kt_aside_menu"
                 data-kt-menu="true">
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ request()->route()->named(['dashboard.home','dashboard.profile*','dashboard.roles.*','dashboard.permissions.*','dashboard.users.*','dashboard.activities.*','dashboard.news.*','dashboard.settings.*','dashboard.app-cities.*','dashboard.news.*','dashboard.offers.*','dashboard.messages.*','dashboard.advertisements.*','dashboard.stories.*','dashboard.branches.*','dashboard.committees.*','dashboard.jobs.*','dashboard.members.*','dashboard.sliders.*']) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                      fill="black"/>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                      rx="2" fill="black"/>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                      fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboard</span>
                    <span class="menu-arrow"></span>
                </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can(get_permission('dashboard.home'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.home') || request()->route()->named('dashboard.profile*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.home') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Home</span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.roles.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.roles.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.roles.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Roles & Privileges</span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.permissions.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.permissions.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.permissions.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Permissions</span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.users.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.users.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.users.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Admins</span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.messages.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.messages.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.messages.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">
                                        Messages
                                        @if($pendingMessages)
                                            <span class="badge badge-danger" style="margin-left: 5px;">
                                                {{ $pendingMessages }}
                                            </span>
                                        @else
                                            <span class="badge badge-danger" style="margin-left: 5px;">
                                                0
                                            </span>
                                        @endif
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.activities.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.activities.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.activities.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">
                                        Activities
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.news.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.news.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.news.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">
                                        News
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.branches.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.branches.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.branches.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">
                                        Branches
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.committees.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.committees.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.committees.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Committees
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.jobs.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.jobs.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.jobs.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">
                                        Jobs
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.members.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.members.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.members.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Members
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.sliders.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.sliders.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.sliders.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Sliders
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ request()->route()->named(['dashboard.reports.*','dashboard.galleries.*','dashboard.videos.*']) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa fa-images"></i>
                        </span>
                        <span class="menu-title">Media Section</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can(get_permission('dashboard.reports.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.reports.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.reports.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Reports
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.galleries.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.galleries.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.galleries.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Gallery
                                    </span>
                                </a>
                            </div>
                        @endcan
                        @can(get_permission('dashboard.videos.index'))
                            <div class="menu-item">
                                <a class="menu-link {{ request()->route()->named('dashboard.videos.*') ? 'active' : '' }}"
                                   href="{{ route('dashboard.videos.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Videos
                                    </span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ request()->route()->named(['dashboard.settings.*']) || in_array(request()->section, ['Services Section','Levels Section','Home Section', 'Communication Section', 'About Page', 'Principles Section', 'Members Page', 'Translations']) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa fa-layer-group"></i>
                        </span>
                        <span class="menu-title">App Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('view_setting')
                            @can('services')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Services Section' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Services Section']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Services</span>
                                    </a>
                                </div>
                            @endcan
                            @can('levels')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Levels Section' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Levels Section']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Levels</span>
                                    </a>
                                </div>
                            @endcan
                            @can('home_settings')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Home Section' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Home Section']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Home Page</span>
                                    </a>
                                </div>
                            @endcan
                            @can('communication_settings')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Communication Section' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Communication Section']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Communication</span>
                                    </a>
                                </div>
                            @endcan
                            @can('about_page_settings')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'About Page' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'About Page']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">About Page</span>
                                    </a>
                                </div>
                            @endcan
                            @can('principles_section_settings')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Principles Section' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Principles Section']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Principles</span>
                                    </a>
                                </div>
                            @endcan
                            @can('committee_page_settings')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Members Page' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Members Page']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Members Page</span>
                                    </a>
                                </div>
                            @endcan
                            @can('translations')
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->route()->named('dashboard.settings.*') && request()->section === 'Translations' ? 'active' : '' }}"
                                       href="{{ route('dashboard.settings.index', ['section' => 'Translations']) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                        <span class="menu-title">Website Translations</span>
                                    </a>
                                </div>
                            @endcan
                        @endcan
                    </div>
                </div>
            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
</div>
<!--end::Aside-->
