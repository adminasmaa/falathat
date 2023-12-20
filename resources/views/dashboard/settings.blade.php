@extends('dashboard.layouts.app')

@section('page.title')
    Settings | {{ config('app.name') }}
@endsection

@section('styles')
    <link href="{{  asset('assets/js/custom/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
    <!--begin::Title-->
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">{{ request()->section }}</h1>
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
            Settings
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            {{ request()->section }}
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
    <form id="kt_add_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
          data-list-route="{{ route('dashboard.settings.index') }}"
          action="{{ route('dashboard.settings.store') }}" data-reload="1" method="POST">
        <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder">{{ $page_settings->first()->section }}</h2>
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
                            @foreach($page_settings as $setting)
                                @switch($setting->type)
                                    @case('file')
                                    <div class="col-{{ $setting->col }}">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <label class="fs-5 fw-bolder form-label mb-2">
                                                    <span>
                                                        {{ ucfirst(str_replace('_', ' ', $setting->key)) }}
                                                    </span>
                                                <a href="{{ Storage::url($setting->value) }}" target="_blank">View
                                                    | Download</a>
                                            </label>
                                            <input type="file"
                                                   name="translated_attributes[{{ $setting->key }}][1][value]"
                                                   class="form-control files" data-key="{{ $setting->key }}"
                                                   id="value_{{ $setting->key }}"/>
                                        </div>
                                    </div>
                                    @break
                                    @case('text')
                                    @foreach($languages as $key => $language)
                                        <div class="col-{{ $setting->col }}">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bolder form-label mb-2">
                                                    <span>
                                                        {{ ucfirst(str_replace('_', ' ', $setting->key)) }} ({{$language->code}})
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                       name="translated_attributes[{{ $setting->key }}][{{$language->id}}][value]"
                                                       id="value_{{ $setting->key }}"
                                                       placeholder="Enter a {{ str_replace('_',' ',$setting->key) }}"
                                                       value="{{ $setting->value($language->code) ?? ''  }}">
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    @endforeach
                                    @break
                                    @case('textarea')
                                    @foreach($languages as $key => $language)
                                        <div class="col-{{ $setting->col }}">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bolder form-label mb-2">
                                                    <span>
                                                        {{ ucfirst(str_replace('_', ' ', $setting->key)) }} ({{$language->code}})
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea class="form-control form-control-solid"
                                                          name="translated_attributes[{{ $setting->key }}][{{$language->id}}][value]"
                                                          id="value_{{ $setting->key }}" rows="5"
                                                          placeholder="Enter a {{ str_replace('_',' ',$setting->key) }}">{{ $setting->value($language->code) ?? ''  }}</textarea>
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    @endforeach
                                    @break
                                    @case('summernote')
                                    @foreach($languages as $key => $language)
                                        <div class="col-{{ $setting->col }}">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bolder form-label mb-2">
                                                    <span>
                                                        {{ ucfirst(str_replace('_', ' ', $setting->key)) }} ({{$language->code}})
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea class="form-control form-control-solid summernote"
                                                          name="translated_attributes[{{ $setting->key }}][{{$language->id}}][value]"
                                                          id="value_{{ $setting->key }}" rows="5"
                                                          placeholder="Enter a {{ str_replace('_',' ',$setting->key) }}">{{ $setting->value($language->code) ?? ''  }}</textarea>
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    @endforeach
                                    @break
                                    @case('repeater')
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div id="kt_repeater_1">
                                                <div class="form-group form-group-last row"
                                                     id="kt_repeater_1">
                                                    <div data-repeater-list="social_media_links"
                                                         class="col-lg-12">
                                                        @if(count(json_decode($setting->value ?: '') ?? []))
                                                            @foreach(json_decode($setting->value ?: '') ?? [] as $social_media_link)
                                                                <div data-repeater-item
                                                                     class="form-group row align-items-center parent_form_repeats">
                                                                    <div class="col-lg-12 row mb-5">
                                                                        <div class="col-lg-3">
                                                                            <label>Name</label>
                                                                            <input
                                                                                class="form-control form-control-md form-control-solid"
                                                                                type="text"
                                                                                name="name"
                                                                                value="{{ $social_media_link->name }}"
                                                                                placeholder="Enter a name"/>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <label>Link</label>
                                                                            <input
                                                                                class="form-control form-control-md form-control-solid"
                                                                                type="text"
                                                                                name="link"
                                                                                value="{{ $social_media_link->link }}"
                                                                                placeholder="Enter a link"/>
                                                                        </div>
                                                                        <div class="col-lg-3">
                                                                            <label>Image</label>
                                                                            <input
                                                                                class="form-control form-control-md form-control-solid"
                                                                                type="file"
                                                                                data-image="{{ $social_media_link->icon }}"
                                                                                name="image"/>
                                                                            @if($social_media_link->icon && $social_media_link->icon !== 'undefined')
                                                                                <a href="{{ Storage::url($social_media_link->icon) }}"
                                                                                   target="_blank">
                                                                                    view image
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            <label>Enabled</label>
                                                                            <select
                                                                                class="form-select form-select-solid"
                                                                                type="text" name="enabled">
                                                                                <option
                                                                                    value="Yes" {{ isset($social_media_link->enabled) && $social_media_link->enabled === 'Yes' ? 'selected' : '' }}>
                                                                                    Yes
                                                                                </option>
                                                                                <option
                                                                                    value="No" {{ isset($social_media_link->enabled) && $social_media_link->enabled === 'No' ? 'selected' : '' }}>
                                                                                    No
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <a href="javascript:;"
                                                                               data-repeater-delete=""
                                                                               style="margin-top: 24px;"
                                                                               class="btn-sm btn btn-danger btn-bold">
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div data-repeater-item
                                                                 class="form-group row align-items-center parent_form_repeats">
                                                                <div class="col-lg-12 row mb-5">
                                                                    <div class="col-lg-3">
                                                                        <label>Name</label>
                                                                        <input
                                                                            class="form-control form-control-md form-control-solid"
                                                                            type="text"
                                                                            name="name"
                                                                            placeholder="Enter a name"/>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <label>Link</label>
                                                                        <input
                                                                            class="form-control form-control-md form-control-solid"
                                                                            type="text"
                                                                            name="link"
                                                                            placeholder="Enter a link"/>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <label>Image</label>
                                                                        <input
                                                                            class="form-control form-control-md form-control-solid"
                                                                            type="file"
                                                                            name="image"/>
                                                                    </div>
                                                                    <div class="col-lg-1">
                                                                        <label>Enabled</label>
                                                                        <select
                                                                            class="form-select form-select-solid"
                                                                            type="text" name="enabled">
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <a href="javascript:;"
                                                                           data-repeater-delete=""
                                                                           style="margin-top: 24px;"
                                                                           class="btn-sm btn btn-danger btn-bold">
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <div class="col-lg-4">
                                                        <a href="javascript:;" data-repeater-create=""
                                                           id="repeater-btn"
                                                           class="btn btn-bold btn-sm btn-primary">
                                                            <i class="la la-plus"></i> Add
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @break
                                @endswitch
                            @endforeach
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <div></div>
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard
                        </button>
                        <button type="submit" class="btn btn-primary" id="kt_add_setting_submit">
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
    <script src="{{  asset('assets/js/custom/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/jquery.repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard/settings.js') }}" type="text/javascript"></script>
@endsection
