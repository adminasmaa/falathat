@extends('dashboard.layouts.app')

@section('page.title')
    Dashboard | Jobs
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Jobs Management</h1>
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
            <a href="{{ route('dashboard.jobs.index') }}"
               class="text-gray-600 text-hover-primary">Jobs</a>
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
          data-list-route="{{ route('dashboard.jobs.index') }}"
          action="{{ route('dashboard.jobs.store') }}" data-reload="1" method="POST">
        <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder">Job Information</h2>
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
                                                Title ({{ $language->code }})
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid"
                                               name="translated_attributes[{{ $language->id }}][title]"
                                               placeholder="Enter a title">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach($languages as $key => $language)
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="{{ $language->required ? 'required' : '' }}">
                                                Brief ({{ $language->code }})
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" rows="5"
                                                  name="translated_attributes[{{ $language->id }}][brief]"
                                                  placeholder="Enter a brief"></textarea>
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        @foreach($languages as $language)
                            <div class="col-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="{{ $language->required ? 'required' : '' }}">
                                                Tags ({{ $language->code }})
                                            </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid"
                                           name="translated_attributes[{{ $language->id }}][tags]"
                                           placeholder="Comma seperated values ( EX: senior, 3 years experience, ... )">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        @endforeach
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
    <script src="{{ asset('assets/js/dashboard/jobs/create.js') }}"></script>
@endsection
