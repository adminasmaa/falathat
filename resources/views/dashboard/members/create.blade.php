@extends('dashboard.layouts.app')

@section('page.title')
    Dashboard | Members
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Members Management</h1>
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
            <a href="{{ route('dashboard.members.index') }}"
               class="text-gray-600 text-hover-primary">Members</a>
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
    <!--begin::Form-->
    <form id="kt_add_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
          data-list-route="{{ route('dashboard.members.index') }}"
          action="{{ route('dashboard.members.store') }}" data-reload="1" method="POST">
        <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder">Member Information</h2>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Form-->
                <div class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_permission_scroll"
                         data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_permission_header"
                         data-kt-scroll-wrappers="#kt_modal_add_permission_scroll" data-kt-scroll-offset="300px"
                         style="max-height: 340px;">
                        <div class="row">
                            @foreach($languages as $language)
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="{{ $language->required ? 'required' : '' }}">
                                                Name ({{ $language->code }})
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid"
                                               name="translated_attributes[{{ $language->id }}][name]"
                                               placeholder="Enter a title">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach($languages as $language)
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="{{ $language->required ? 'required' : '' }}">
                                                Job Description ({{ $language->code }})
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid"
                                               name="translated_attributes[{{ $language->id }}][job_description]"
                                               placeholder="Enter a job description">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="required">
                                                Phone
                                            </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid"
                                           name="phone"
                                           placeholder="Enter a phone">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="required">
                                                Email
                                            </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid"
                                           name="email"
                                           placeholder="Enter a email">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">
                                            Type
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-control-solid"
                                            name="type">
                                        <option value="">Select Type</option>
                                        <option value="{{ \App\Models\Member::BOD_MEMBER }}">
                                            {{ \App\Models\Member::TYPES[\App\Models\Member::BOD_MEMBER] }}
                                        </option>
                                        <option value="{{ \App\Models\Member::COMMITTEE_MEMBER }}">
                                            {{ \App\Models\Member::TYPES[\App\Models\Member::COMMITTEE_MEMBER] }}
                                        </option>
                                    </select>
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
                                        <span class="required">Image</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" type="file" id="image"
                                           name="image">
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
                                            <span class="required">
                                                Membership Number
                                            </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid"
                                           name="membership_number"
                                           placeholder="Enter a membership number">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <div></div>
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard
                        </button>
                        <button type="submit" class="btn btn-primary" id="kt_add_submit">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
    </form>
    <!--end::Form-->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/dashboard/members/create.js') }}"></script>
@endsection
