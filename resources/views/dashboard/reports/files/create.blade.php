@extends('dashboard.layouts.app')

@section('page.title')
    Dashboard | Files
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Files Management</h1>
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
            <a href="{{ route('dashboard.reports.index') }}"
               class="text-gray-600 text-hover-primary">Reports</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ route('dashboard.reports.files.index', $report) }}"
               class="text-gray-600 text-hover-primary">Files</a>
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
          data-list-route="{{ route('dashboard.reports.files.index', $report) }}"
          action="{{ route('dashboard.reports.files.store', $report) }}" data-reload="1" method="POST">
        <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder">Report Files</h2>
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
                        <!-- Images Section -->
                        <div class="fv-row mb-5">
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_dropzone" data-type="images">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to
                                            upload.</h3>
                                        <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!-- Images Section -->
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
    <script src="{{ asset('assets/js/dashboard/reports/files/create.js') }}"></script>
@endsection
