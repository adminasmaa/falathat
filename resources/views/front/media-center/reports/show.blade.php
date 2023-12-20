@extends('front.layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $report->title('ar') }}
    </li>
@endsection

@section('styles')
    <style>

        #policies .a-box {
            display: inline-block;
            width: 240px;
            text-align: center;
        }

        #policies .img-container {
            height: 230px;
            width: 200px;
            overflow: hidden;
            border-radius: 0px 0px 20px 20px;
            display: inline-block;
        }

        #policies .img-container img {
            margin: 15%;
        }

        #policies .inner-skew {
            display: inline-block;
            border-radius: 20px;
            overflow: hidden;
            padding: 0px;
            font-size: 0px;
            margin: 30px 0px 0px 0px;
            /* background: #c8c2c2; */
            height: 250px;
            width: 200px;
        }

        #policies .text-container {
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
            padding: 90px 20px 20px 20px;
            border-radius: 20px;
            background: #fff;
            margin: -120px 0px 0px 0px;
            line-height: 19px;
            font-size: 14px;
        }

        #policies .text-container h3 {
            margin: 20px 0px 10px 0px;
            color: #04bcff;
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $report->title('ar')])

    <section id="policies" class="padding">
        <div class="container">
            <div class="row">
                @foreach($files as $file)
                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                        <div class="a-box">
                            <div class="img-container">
                                <div class="img-inner">
                                    <div class="inner-skew">
                                        <img src="{{ asset('front-assets/kids/images/' . ($file->type) . '.svg') }}"
                                             width="140px">
                                    </div>
                                </div>
                            </div>
                            <div class="text-container">
                                <h3></h3>
                                <div>
                                    <button class="button gradient-btn"
                                            onclick="window.location.href = '{{ route('front.files.download', $file) }}'">
                                        {{ $settings['Translations']['download'] }}
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection
