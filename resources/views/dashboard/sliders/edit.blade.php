@extends('dashboard.layouts.app')

@section('page.title')
    Dashboard | Sliders
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Sliders Management</h1>
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
            <a href="{{ route('dashboard.sliders.index') }}"
               class="text-gray-600 text-hover-primary">Sliders</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            {{ $slider->title }}
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            Edit
        </li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <!--begin::Form-->
    <form id="kt_add_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
          data-list-route="{{ route('dashboard.sliders.index') }}"
          action="{{ route('dashboard.sliders.update', $slider) }}" data-reload="1"
          method="POST">
        @method('PUT')
        <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder">Slider Information</h2>
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
                                               value="{{ $slider->title($language->code) }}"
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
                            @foreach($languages as $language)
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
                                        <textarea class="form-control form-control-solid" rows="3"
                                                  name="translated_attributes[{{ $language->id }}][brief]"
                                                  placeholder="Enter a brief">{{ $slider->brief($language->code) }}</textarea>
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
                                                Link ({{ $language->code }})
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid"
                                               name="translated_attributes[{{ $language->id }}][link]"
                                               value="{{ $slider->link($language->code) }}"
                                               placeholder="Enter a link">
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
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($slider->image) }}"
                                               target="_blank">
                                                Show Image
                                            </a>
                                        </span>
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
                            <div class="col-4">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                            <span class="{{ $language->required ? 'required' : '' }}">
                                                Icon
                                            </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid"
                                           name="icon" value="{{ $slider->icon }}"
                                           placeholder="Enter a icon">
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
                                            <span class="{{ $language->required ? 'required' : '' }}">
                                                Color
                                            </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-control-solid"
                                            name="color">
                                        <option value="">Select Color</option>
                                        <option value="orange" {{ $slider->color == 'orange' ? 'selected' : '' }}>
                                            Orange
                                        </option>
                                        <option
                                            value="light-blue" {{ $slider->color == 'light-blue' ? 'selected' : '' }}>
                                            Light Blue
                                        </option>
                                        <option value="green" {{ $slider->color == 'green' ? 'selected' : '' }}>
                                            Green
                                        </option>
                                        <option value="blue" {{ $slider->color == 'blue' ? 'selected' : '' }}>
                                            Blue
                                        </option>
                                        <option value="yellow" {{ $slider->color == 'yellow' ? 'selected' : '' }}>
                                            Yellow
                                        </option>
                                    </select>
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">
                                            Position
                                        </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid"
                                                name="position">
                                            <option value="0">Select Position</option>
                                            <option
                                                value="{{ \App\Models\Slider::RIGHT }}" {{ $slider->position == \App\Models\Slider::RIGHT ? 'selected' : '' }}>
                                                {{ \App\Models\Slider::POSITIONS[\App\Models\Slider::RIGHT] }}
                                            </option>
                                            <option
                                                value="{{ \App\Models\Slider::MIDDLE }}" {{ $slider->position == \App\Models\Slider::MIDDLE ? 'selected' : '' }}>
                                                {{ \App\Models\Slider::POSITIONS[\App\Models\Slider::MIDDLE] }}
                                            </option>
                                            <option
                                                value="{{ \App\Models\Slider::LEFT }}" {{ $slider->position == \App\Models\Slider::LEFT ? 'selected' : '' }}>
                                                {{ \App\Models\Slider::POSITIONS[\App\Models\Slider::LEFT] }}
                                            </option>
                                        </select>
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
                                            Type
                                        </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid"
                                                name="type">
                                            <option value="">Select Type</option>
                                            <option
                                                value="{{ \App\Models\Slider::MAIN }}" {{ $slider->type == \App\Models\Slider::MAIN ? 'selected' : '' }}>
                                                {{ \App\Models\Slider::TYPES[\App\Models\Slider::MAIN] }}
                                            </option>
                                            <option
                                                value="{{ \App\Models\Slider::SECONDARY }}" {{ $slider->type == \App\Models\Slider::SECONDARY ? 'selected' : '' }}>
                                                {{ \App\Models\Slider::TYPES[\App\Models\Slider::SECONDARY] }}
                                            </option>
                                        </select>
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
    <script src="{{ asset('assets/js/dashboard/sliders/create.js') }}"></script>
@endsection
