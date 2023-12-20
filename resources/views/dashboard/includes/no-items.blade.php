<!--begin::Card-->
<div class="card">
    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Wrapper-->
        <div class="card-px text-center py-20 my-10">
        @if(!request()->query->count())
            <!--begin::Title-->
                <h2 class="fs-2x fw-bolder mb-10">Welcome!</h2>
                <!--end::Title-->
                <!--begin::Description-->
                <p class="text-gray-400 fs-4 fw-bold mb-10">There are
                    no {{ \Illuminate\Support\Str::plural($module ?? '-') }} added yet.
                    <br/>Manage your CRM by adding your first {{ $module ?? '-' }}</p>
                <!--end::Description-->
                @if(isset($route))
                    <!--begin::Export-->
                    @if(isset($import) && $import)
                        @can(get_permission($import))
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_customers_export_modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fa fa-file-import"></i>
                                </span>
                                <!--end::Svg Icon-->
                                Import {{ \Illuminate\Support\Str::plural(ucfirst($module)) }}
                            </button>
                        @endcan
                    @endif
                    <!--end::Export-->
                    <!--begin::Action-->
                    <a href="{{ $route ?? '#!' }}" class="btn btn-primary">Add {{ ucfirst($module) }}</a>
                    <!--end::Action-->
                @endif
            @else
            <!--begin::Title-->
                <h2 class="fs-2x fw-bolder mb-10">No Results!</h2>
                <!--end::Title-->
                @if(isset($list_route))
                    <!--begin::Action-->
                    <a href="{{ $list_route ?? '#!' }}"
                       class="btn btn-primary">List {{ ucfirst(\Illuminate\Support\Str::plural($module ?? '-')) }}
                    </a>
                    <!--end::Action-->
                @endif
            @endif
        </div>
        <!--end::Wrapper-->
        <!--begin::Illustration-->
        <div class="text-center px-4">
            <img class="mw-100 mh-300px" alt=""
                 src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}"/>
        </div>
        <!--end::Illustration-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
