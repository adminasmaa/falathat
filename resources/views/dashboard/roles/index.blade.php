@extends('dashboard.layouts.app')

@section('page.title')
    Dashboard | Roles
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Roles Management</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ route('dashboard.home') }}" class="text-gray-600 text-hover-primary">Home</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">Roles</li>
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
        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
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
            <form id="search" action="{{ route('dashboard.roles.index') }}">
                <div class="px-7 py-5">
                    <!--begin::Input group-->
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bolder form-label mb-2">
                            <span>Role name</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="ٍSearch by a role name"
                               name="name" value="{{ request()->name }}">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-bold">Role Status:</label>
                        <!--end::Label-->
                        <!--begin::Options-->
                        <div class="d-flex">
                            <!--begin::Options-->
                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                <input class="form-check-input" type="checkbox" name="status[]" value="1"
                                       @if(in_array(1,request()->status ?? [])) checked="checked" @endif/>
                                <span class="form-check-label">Active</span>
                            </label>
                            <!--end::Options-->
                            <!--begin::Options-->
                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="status[]" value="0"
                                       @if(in_array(0,request()->status ?? [])) checked="checked" @endif/>
                                <span class="form-check-label">Inactive</span>
                            </label>
                            <!--end::Options-->
                        </div>
                        <!--end::Options-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('dashboard.roles.index') }}"
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
    @can(get_permission('dashboard.roles.create'))
        <!--begin::Button-->
        <a href="{{ route('dashboard.roles.create') }}" class="btn btn-dark fw-bolder" id="kt_toolbar_primary_button">
            Create
        </a>
        <!--end::Button-->
    @endcan
@endsection

@section('content')
    @if($roles->count())
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

                        <form id="search" action="{{ route('dashboard.roles.index') }}">
                            <input type="text" name="name" value="{{ request()->name }}"
                                   class="form-control form-control-solid w-250px ps-14" placeholder="Search Roles"/>
                        </form>
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        @canany(get_permission(['dashboard.bulk.roles.change.status','dashboard.bulk.roles.delete']))
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
                                @can(get_permission('dashboard.bulk.roles.change.status'))
                                    <div class="menu-item px-3">
                                        <a data-url="{{ route('dashboard.bulk.roles.change.status') }}"
                                           data-bs-toggle="modal"
                                           data-bs-target="#update_status_modal"
                                           class="menu-link px-3 update-statuses-button">
                                            Status
                                        </a>
                                    </div>
                                @endcan
                                @can(get_permission('dashboard.bulk.roles.delete'))
                                    <div class="menu-item px-3">
                                        <a data-url="{{ route('dashboard.bulk.roles.delete') }}"
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
            <div class="card-body pt-0"  style="overflow: scroll;width: 100%;">
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
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">No. Users</th>
                        <th class="min-w-125px">No. Permissions</th>
                        <th class="min-w-125px">Creation Date</th>
                        @canany(get_permission(['dashboard.roles.edit','dashboard.roles.destroy']))
                            <th class="text-end min-w-70px">Actions</th>
                        @endcanany
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold" id="bulk-actions">
                    @foreach($roles as $role)
                        <tr id="row-{{ $role->id }}">
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="admins" name="admins[]"
                                           value="{{ $role->id }}"/>
                                </div>
                            </td>
                            <!--end::Checkbox-->
                            <!--begin::Customer=-->
                            <td>{{ $role->name }}</td>
                            <!--end::Customer=-->
                            <!--begin::Status=-->
                            <td>
                                @can(get_permission('dashboard.bulk.roles.change.status'))
                                    <div class="col-1">
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" id="change-status" type="checkbox"
                                                   data-id="{{ $role->id }}"
                                                   data-url="{{ route('dashboard.bulk.roles.change.status') }}"
                                                   @if($role->status) checked="checked" @endif/>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                @else
                                    <div
                                        class="badge badge-light-{{ $role->status ? 'success' : 'danger' }} }}">
                                        {{ $role->status ? 'Active' : 'Inactive' }}
                                    </div>
                                @endcan
                            </td>
                            <!--end::Status=-->
                            <!--begin::Billing=-->
                            <td>
                                <div class="badge badge-light">
                                    <a href="{{ route('dashboard.users.index', ['role' => $role->id]) }}">
                                        {{ $role->users->count() }}
                                    </a>
                                </div>
                            </td>
                            <!--end::Billing=-->
                            <!--begin::Product=-->
                            <td>
                                {{ $role->permissions->count() }}
                            </td>
                            <!--end::Product=-->
                            <!--begin::Date=-->
                            <td>{{ $role->created_at->format('M d, Y') }}</td>
                            <!--end::Date=-->
                            <!--begin::Action=-->

                            @canany(get_permission(['dashboard.roles.edit','dashboard.roles.destroy']))
                                <td class="text-end">
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
                                    @can(get_permission('dashboard.roles.edit'))
                                        <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('dashboard.roles.edit', $role) }}"
                                                   class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                    @endcan
                                    @can(get_permission('dashboard.roles.destroy'))
                                        <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a data-url="{{ route('dashboard.roles.destroy', $role) }}"
                                                   data-item-id="{{ $role->id }}"
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
                {!! $roles->appends(request()->except('page'))->links('vendor.pagination.default') !!}
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    @else
        @include('dashboard.includes.no-items',['module' => 'role','route' => route('dashboard.roles.create'),'list_route' => route('dashboard.roles.index')])
    @endif

    @include('dashboard.includes.delete-modal',['action_message' => 'role'])
    @include('dashboard.includes.modals.update-status')
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/dashboard/delete-item.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard/change-statuses.js') }}" type="text/javascript"></script>
@endsection
