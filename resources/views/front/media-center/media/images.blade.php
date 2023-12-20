@extends('front.layouts.app')

@section('styles')
    <style>
        #gallery-list .hello {
            opacity: 1 !important;
        }

        #gallery-list .full {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 999999;
        }

        #gallery-list .full .content {
            background-color: rgba(0, 0, 0, 0.75) !important;
            height: 100%;
            width: 100%;
            display: grid;
        }

        #gallery-list .full .content img {
            left: 50%;
            transform: translate3d(0, 0, 0);
            animation: zoomin 1s ease;
            max-width: 100%;
            max-height: 100%;
            margin: auto;
        }

        #gallery-list .byebye {
            opacity: 0;
        }

        #gallery-list .byebye:hover {
            transform: scale(0.2) !important;
        }

        #gallery-list .gallery {
            display: grid;
            grid-column-gap: 8px;
            grid-row-gap: 8px;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-auto-rows: 8px;
        }

        #gallery-list .gallery img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 16px #333;
            transition: all 1.5s ease;
        }

        #gallery-list .gallery img:hover {
            box-shadow: 0 0 32px #333;
        }

        #gallery-list .gallery .content {
            padding: 4px;
        }

        #gallery-list .gallery .gallery-item {
            transition: grid-row-start 300ms linear;
            transition: transform 300ms ease;
            transition: all 0.5s ease;
            cursor: pointer;
        }

        #gallery-list .gallery .gallery-item:hover {
            transform: scale(1.025);
        }

        @media (max-width: 600px) {
            #gallery-list .gallery {
                grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
            }
        }

        @media (max-width: 400px) {
            #gallery-list .gallery {
                grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
            }
        }
    </style>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['images'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['images']])

    <section id="gallery-list" class="padding">
        <div class="container">
            <div class="gallery" id="gallery">
                @foreach($images as $image)
                    <div class="gallery-item">
                        <div class="content"><img src="{{ Storage::disk('public')->url($image->image) }}" alt=""></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection

@section('scripts')
    <script>
        var gallery = document.querySelector('#gallery');
        var getVal = function (elem, style) {
            return parseInt(window.getComputedStyle(elem).getPropertyValue(style));
        };
        var getHeight = function (item) {
            return item.querySelector('.content').getBoundingClientRect().height;
        };
        var resizeAll = function () {
            var altura = getVal(gallery, 'grid-auto-rows');
            var gap = getVal(gallery, 'grid-row-gap');
            gallery.querySelectorAll('.gallery-item').forEach(function (item) {
                var el = item;
                el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
            });
        };
        gallery.querySelectorAll('img').forEach(function (item) {
            item.classList.add('byebye');
            if (item.complete) {
                console.log(item.src);
            } else {
                item.addEventListener('load', function () {
                    var altura = getVal(gallery, 'grid-auto-rows');
                    var gap = getVal(gallery, 'grid-row-gap');
                    var gitem = item.parentElement.parentElement;
                    gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                    item.classList.remove('byebye');
                });
            }
        });
        window.addEventListener('resize', resizeAll);
        gallery.querySelectorAll('.gallery-item').forEach(function (item) {
            item.addEventListener('click', function () {
                item.classList.toggle('full');
            });
        });

    </script>
@endsection
