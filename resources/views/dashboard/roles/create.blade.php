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
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ route('dashboard.roles.index') }}" class="text-gray-600 text-hover-primary">Roles</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            Create
        </li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2 class="fw-bolder">Create Role</h2>
            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Form-->
            <form id="kt_add_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                  data-list-route="{{ route('dashboard.roles.index') }}"
                  action="{{ route('dashboard.roles.store') }}" data-reload="1">
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true"
                     data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                     data-kt-scroll-dependencies="#kt_modal_add_role_header"
                     data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px"
                     style="max-height: 340px;">
                    <div class="row">
                        <div class="col-10">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bolder form-label mb-2">
                                    <span class="required">Role name</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="Enter a role name"
                                       name="name">
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-1">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-5">
                                <span class="required">Status</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" name="status" id="status" type="checkbox"
                                       checked="checked"/>
                                <span class="form-check-label fw-bold text-muted">
                                    Active
                                </span>
                            </label>
                            <!--end::Switch-->
                        </div>
                    </div>
                    <!--begin::Permissions-->
                    <div class="fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                        <!--end::Label-->
                        <!--begin::Table wrapper-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                <!--begin::Table row-->
                                <tr>
                                    <td class="text-gray-800">Administrator Access
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                           data-bs-original-title="Allows a full access to the system"
                                           aria-label="Allows a full access to the system"></i></td>
                                    <td>
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-custom form-check-solid me-9">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="kt_roles_select_all">
                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                        </label>
                                        <!--end::Checkbox-->
                                    </td>
                                </tr>
                                <!--end::Table row-->
                                @foreach($permissions->sortByDesc(fn($q) => $q->count()) as $module => $module_permissions)
                                    <!--begin::Table row-->
                                    <tr @if(in_array($module,['home','profile'])) class="d-none" @endif>
                                        <!--begin::Label-->
                                        <td class="text-gray-800">
                                            {{ str_replace('_', ' ' ,ucfirst($module)) }}
                                        </td>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <td>
                                            <!--begin::Wrapper-->
                                            <div class="d-flex">
                                            @foreach($module_permissions as $permission)
                                                <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input
                                                            class="permissions form-check-input @if(in_array($module,['home','profile'])) d-none default @endif"
                                                            type="checkbox"
                                                            name="permissions[]"
                                                            @if(in_array($module,['home','profile']))
                                                            checked
                                                            @endif
                                                            value="{{ $permission->id }}">
                                                        <span class="form-check-label">
                                                            {{ $permission->nice_name ? $permission->nice_name : $permission->name  }}
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                @endforeach
                                            </div>
                                            <!--end::Wrapper-->
                                        </td>
                                        <!--end::Options-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                    <button type="submit" class="btn btn-primary" id="kt_add_role_submit">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <!--end::Actions-->
                <div></div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/dashboard/roles/create.js') }}"></script>
@endsection
