@extends('front.layouts.app')

@section('styles')
    <style>
        .video-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .video-card {
            /* width: 30%; */
            margin-bottom: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            overflow: hidden;
        }

        .video-thumbnail {
            position: relative;
        }

        .video-thumbnail img {
            width: 100%;
            height: auto;
        }

        .play-button {
            position: absolute;
            top: 40%;
            left: 40%;
            /* transform: translate(-50%, -50%); */
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        .video-card:hover .play-button {
            transform: scale(1.2);
        }

        .video-title {
            margin: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .video-modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgb(0 0 0 / 37%);
        }

        .video-modal {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 60%;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            overflow: hidden;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border: none;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .close-button:hover {
            transform: scale(1.2);
        }

        .video-player {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }
    </style>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['videos'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['videos']])


    <section id="vidoes_media" class="padding">
        <div class="container">
            <div class="row">
                @foreach($videos as $key => $video)
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="video-gallery">
                            <div class="video-card" data-video="{{ $video->video }}">
                                <div class="video-thumbnail">
                                    <img src="{{ Storage::url($video->thumbnail) }}" alt="Video Thumbnail">
                                    <button class="play-button"><i class="fa fa-play"></i></button>
                                </div>
                                <h3 class="video-title">#{{ ++$key }}</h3>
                            </div>
                        </div>
                        @if($key === 1)
                            <div class="video-modal-container">
                                <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                <div class="video-modal">
                                    <div class="video-player"></div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    @include('front.includes.contact-section')
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".play-button").click(function () {
                debugger
                var videoUrl = $(this).closest(".video-card").data("video");
                var iframe = `<iframe src="${videoUrl}" width="100%" height="100%" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen ></iframe>`
                // var iframe = '<iframe src="' + videoUrl + '" allowfullscreen></iframe>';
                $(".video-player").html(iframe);
                $(".video-modal-container").fadeIn();
            });

            $(".close-button, .overlay").click(function () {
                $(".video-modal-container").fadeOut();
                $(".video-player").html("");
            });
        });
    </script>
@endsection
