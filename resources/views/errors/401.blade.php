@extends('errors.layouts.error')

@section('page.title')
    401
@endsection

@section('content')
    <!--begin::Authentication - 401 Page-->
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <!--begin::Illustration-->
        <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}" alt="" class="mw-100 mb-10 h-lg-450px"/>
        <!--end::Illustration-->
        <!--begin::Message-->
        <h1 class="fw-bold mb-10" style="color: #A3A3C7">You're not authorized to access this page.</h1>
        <!--end::Message-->
        <!--begin::Link-->
        <form action="{{ route('logout') }}" method="get">
            @csrf
            <button class="btn btn-primary">Logout</button>
        </form>
        <!--end::Link-->
    </div>
    <!--end::Authentication - 401 Page-->
@endsection
