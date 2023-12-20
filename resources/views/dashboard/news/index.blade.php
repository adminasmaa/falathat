@extends('dashboard.layouts.app')

@section('page.title')
    Dashboard | News
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">News Management</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ route('dashboard.home') }}" class="text-gray-600 text-hover-primary">Home</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">News</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('actions')
    <!--begin::Wrapper-->
    <div class="me-3">
        <!--begin::Menu-->
        <a href="#" class="btn btn-light fw-bolder" data-kt-menu-trigger="click"
           data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none">
                    <path
                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                        fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
            Filter
        </a>
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-700px w-md-750px" data-kt-menu="true"
             id="kt_menu_61de116b90306">
            <!--begin::Header-->
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
            </div>
            <!--end::Header-->
            <!--begin::Menu separator-->
            <div class="separator border-gray-200"></div>
            <!--end::Menu separator-->
            <!--begin::Form-->
            <form id="search" action="{{ route('dashboard.news.index') }}">
                <div class="px-7 py-5">
                    <div class="row">
                        <div class="col-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bolder form-label mb-2">
                                    <span>Title</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="ٍSearch by a title"
                                       name="title" value="{{ request()->title }}">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bolder form-label mb-2">
                                    <span>Date From</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" type="date"
                                       name="date_from" value="{{ request()->date_from }}">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bolder form-label mb-2">
                                    <span>Date To</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" type="date"
                                       name="date_to" value="{{ request()->date_to }}">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('dashboard.news.index') }}"
                           class="btn btn-sm btn-light btn-active-light-primary me-2"
                           data-kt-menu-dismiss="true">Reset
                        </a>
                        <button type="submit" class="btn btn-sm btn-primary"
                                data-kt-menu-dismiss="true">Apply
                        </button>
                    </div>
                    <!--end::Actions-->
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Menu 1-->
        <!--end::Menu-->
    </div>
    <!--end::Wrapper-->
    @can(get_permission('dashboard.news.create'))
        <!--begin::Button-->
        <a href="{{ route('dashboard.news.create') }}" class="btn btn-dark fw-bolder"
           id="kt_toolbar_primary_button">
            Create
        </a>
        <!--end::Button-->
    @endcan
@endsection

@section('content')
    @if($news->count())
        <div class="row g-5 g-xl-8">
            <div class="col-xl-12">
                <!--begin: Statistics Widget 6-->
                <div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body my-3">
                        <a href="#" class="card-title fw-bolder text-primary fs-5 mb-3 d-block">Total News</a>
                        <div class="py-1">
                            <span class="text-dark fs-1 fw-bolder me-2">{{ $newsQuery->count() }}</span>
                        </div>
                    </div>
                    <!--end:: Body-->
                </div>
                <!--end: Statistics Widget 6-->
            </div>
        </div>
    @endif
    @if($news->count())
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                  height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                  fill="black"/>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"/>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->

                        <form id="search" action="{{ route('dashboard.news.index') }}">
                            <input type="text" name="name" value="{{ request()->name }}"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="Search News"/>
                        </form>
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        @canany(get_permission(['dashboard.bulk.news.delete']))
                            <a href="#" class="btn btn-light btn-active-light-primary"
                               data-kt-menu-trigger="click"
                               data-kt-menu-placement="bottom-end">Bulk
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black"/>
                                            </svg>
                                        </span>
                                <!--end::Svg Icon-->
                            </a>
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                @can(get_permission('dashboard.bulk.news.delete'))
                                    <div class="menu-item px-3">
                                        <a data-url="{{ route('dashboard.bulk.news.delete') }}"
                                           data-bs-toggle="modal"
                                           data-bs-target="#delete_modal"
                                           class="menu-link px-3 delete-users-button">
                                            Delete
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        @endcanany
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0" style="overflow: scroll;width: 100%;">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                       data-kt-check-target="#kt_subscriptions_table form-check-input" value="1"/>
                            </div>
                        </th>
                        <th class="min-w-90px">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => (request('sort') == 'asc' ? 'desc' : 'asc')]) }}">
                                <i class="fa fa-sort"></i>
                            </a>
                            ID
                        </th>
                        <th class="min-w-50px">Thumbnail</th>
                        <th class="min-w-50px">Image</th>
                        <th class="min-w-50px">Title</th>
                        <th class="min-w-50px">Author</th>
                        <th class="min-w-50px">Creation Date</th>
                        @canany(get_permission(['dashboard.news.edit','dashboard.news.destroy']))
                            <th class="min-w-70px">Actions</th>
                        @endcanany
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold" id="bulk-actions">
                    @foreach($news as $single_news)
                        <tr id="row-{{ $single_news->id }}">
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="admins" name="admins[]"
                                           value="{{ $single_news->id }}"/>
                                </div>
                            </td>
                            <!--end::Checkbox-->
                            <td>
                                <div
                                    class="badge badge-light-info">
                                    {{ $single_news->id }}
                                </div>
                            </td>
                            <td>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($single_news->thumbnail) }}" width="70"
                                     height="70" alt="">
                            </td>
                            <td>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($single_news->image) }}" width="70"
                                     height="70" alt="">
                            </td>
                            <!--begin::Customer=-->
                            <td>{{ $single_news->title }}</td>
                            <!--end::Customer=-->
                            <td>{{ $single_news->author }}</td>
                            <!--begin::Date=-->
                            <td>{{ $single_news->created_at->format('M d, Y') }}</td>
                            <!--end::Date=-->
                            <!--begin::Action=-->

                            @canany(get_permission(['dashboard.news.edit','dashboard.news.destroy']))
                                <td>
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                       data-kt-menu-trigger="click"
                                       data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        @can(get_permission('dashboard.news.edit'))
                                            <div class="menu-item px-3">
                                                <a href="{{ route('dashboard.news.edit', $single_news) }}"
                                                   class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                        @endcan
                                        @can(get_permission('dashboard.news.destroy'))
                                        <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a data-url="{{ route('dashboard.news.destroy', $single_news) }}"
                                                   data-item-id="{{ $single_news->id }}"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#delete_modal"
                                                   class="menu-link px-3 delete-button">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        @endcan
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            @endcanany
                        </tr>
                    @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                {!! $news->appends(request()->except('page'))->links('vendor.pagination.default') !!}
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    @else
        @include('dashboard.includes.no-items',['module' => 'news','route' => route('dashboard.news.create'),'list_route' => route('dashboard.news.index')])
    @endif

    @include('dashboard.includes.delete-modal',['action_message' => 'news'])
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/dashboard/delete-item.js') }}" type="text/javascript"></script>
@endsection
