@extends('errors.layouts.error')

@section('page.title')
    404
@endsection

@section('content')
    <!--begin::Authentication - 404 Page-->
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <!--begin::Illustration-->
        <img src="{{ asset('assets/media/illustrations/sketchy-1/18.png') }}" alt="" class="mw-100 mb-10 h-lg-450px"/>
        <!--end::Illustration-->
        <!--begin::Message-->
        <h1 class="fw-bold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
        <!--end::Message-->
        <!--begin::Link-->
        <a href="{{ route('dashboard.home') }}" class="btn btn-primary">Return Home</a>
        <!--end::Link-->
    </div>
    <!--end::Authentication - 404 Page-->
@endsection
