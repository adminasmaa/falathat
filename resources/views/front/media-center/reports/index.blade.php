@extends('front.layouts.app')

@section('styles')
    <style>
        :root {
            --base-grid: 8px;
            --colour-body-background: #fff;
            --colour-background: #548E99;
            --colour-background-folded: #548E99;
            --colour-background-stripes: #8CB6BE;
            --colour-text: #fff;
        }


        #news_general .articles {
            margin: calc(var(--base-grid) * 2) auto calc(var(--base-grid) * 5);
            display: grid;
            grid-row-gap: calc(var(--base-grid) * 8);
            grid-column-gap: calc(var(--base-grid) * 6);
            grid-template-columns: repeat(auto-fit, minmax(calc(var(--base-grid) * 35), 1fr));
            justify-items: center;
        }

        #news_general .articles__article {
            cursor: pointer;
            display: block;
            position: relative;
            animation-name: animateIn;
            animation-duration: .35s;
            animation-delay: calc(var(--animation-order) * 100ms);
            animation-fill-mode: both;
            animation-timing-function: ease-in-out;
        }

        #news_general .articles__article:before {
            content: "";
            position: absolute;
            top: calc(var(--base-grid) * -2);
            left: calc(var(--base-grid) * -2);
            border: 2px dashed var(--colour-background);
            background-image: repeating-linear-gradient(-24deg, transparent, transparent 4px, var(--colour-background-stripes) 0, var(--colour-background-stripes) 5px);
            z-index: -1;
        }

        #news_general .articles__article.before-orange:before {
            background-image: repeating-linear-gradient(-24deg, transparent, transparent 4px, #BB5F44 0, #BB5F44 5px) !important;
            border: 2px dashed #BB5F44 !important;
        }

        #news_general .articles__article.before-light-blue:before {
            border: 2px dashed #8CB6BE !important;
            background-image: repeating-linear-gradient(-24deg, transparent, transparent 4px, #8CB6BE 0, #8CB6BE 5px) !important;
        }

        #news_general .articles__article.before-green:before {
            border: 2px dashed #C1CA6D !important;
            background-image: repeating-linear-gradient(-24deg, transparent, transparent 4px, #C1CA6D 0, #C1CA6D 5px) !important;
        }

        #news_general .articles__article.before-yellow:before {
            border: 2px dashed #e4dc99 !important;
            background-image: repeating-linear-gradient(-24deg, transparent, transparent 4px, #e4dc99 0, #e4dc99 5px) !important;
        }

        #news_general .articles__article,
        #news_general .articles__article:before {
            width: calc(var(--base-grid) * 35);
            height: calc(var(--base-grid) * 35);
        }

        #news_general .articles__link {
            background-color: var(--colour-body-background);
            border: 2px solid var(--colour-background);
            display: block;
            width: 100%;
            height: 100%;
            perspective: 1000px;
        }

        #news_general .articles__link:after {
            content: "";
            position: absolute;
            top: 50%;
            right: calc(var(--base-grid) * 3);
            width: calc(var(--base-grid) * 2);
            height: calc(var(--base-grid) * 2);
            margin-top: calc(var(--base-grid) * -1);
            clip-path: polygon(75% 0, 100% 50%, 75% 100%, 0 100%, 25% 50%, 0 0);
            -webkit-clip-path: polygon(75% 0, 100% 50%, 75% 100%, 0 100%, 25% 50%, 0 0);
            background-color: var(--colour-background);
            opacity: 0;
            transition: opacity .5s ease-in, transform .3s ease-in-out 0ms;
        }

        #news_general .articles__link.after-orange {
            border: 2px solid #BB5F44 !important;
        }

        #news_general .articles__link.after-light-blue {
            border: 2px solid #8CB6BE !important;
        }

        #news_general .articles__link.after-green {
            border: 2px solid #C1CA6D !important;
        }

        #news_general .articles__link.after-yellow {
            border: 2px solid #e4dc99 !important;
        }

        #news_general .articles__link.after-orange:after {
            background-color: #BB5F44 !important;
            border: 2px solid #BB5F44 !important;
        }

        #news_general .articles__link.after-light-blue:after {
            background-color: #8CB6BE !important;
            border: 2px solid #8CB6BE !important;
        }

        #news_general .articles__link.after-green:after {
            background-color: #C1CA6D !important;
            border: 2px solid #C1CA6D !important;
        }

        #news_general .articles__link.after-yellow:after {
            background-color: #e4dc99 !important;
            border: 2px solid #e4dc99 !important;
        }

        #news_general .articles__content {
            background-color: var(--colour-background);
            color: var(--colour-text);
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: calc(var(--base-grid) * 2);
            display: flex;
            flex-direction: column;
            border: 2px solid var(--colour-background);
        }

        #news_general .articles__content.bg-orange {
            background-color: #BB5F44 !important;
            border: 2px solid #BB5F44 !important;
        }

        #news_general .articles__content.bg-light-blue {
            background-color: #8CB6BE !important;
            border: 2px solid #8CB6BE !important;
        }

        #news_general .articles__content.bg-green {
            background-color: #C1CA6D !important;
            border: 2px solid #C1CA6D !important;
        }

        #news_general .articles__content.bg-yellow {
            background-color: #e4dc99 !important;
            border: 2px solid #e4dc99 !important;
        }

        #news_general .articles__content--lhs {
            clip-path: polygon(0 0, 51% 0, 51% 100%, 0 100%);
            -webkit-clip-path: polygon(0 0, 51% 0, 51% 100%, 0 100%);
        }

        #news_general .articles__content--rhs {
            clip-path: polygon(50% 0, 100% 0, 100% 100%, 50% 100%);
            -webkit-clip-path: polygon(50% 0, 100% 0, 100% 100%, 50% 100%);
            transition: transform .5s ease-in-out, background-color .4s ease-in-out;
        }

        #news_general .articles__title {
            font-size: calc(var(--base-grid) * 4);
            line-height: 1.125;
            font-weight: 700;
            letter-spacing: -.02em;
        }

        #news_general .articles__footer {
            margin-top: auto;
            font-size: calc(var(--base-grid) * 2);
            line-height: calc(var(--base-grid) * 2);
            display: flex;
            justify-content: space-between;
        }

        #news_general .articles__link:hover .articles__content--rhs {
            background-color: var(--colour-background-folded);
            transform: rotateY(-50deg);
        }

        #news_general .articles__link:hover:after {
            opacity: 1;
            transform: translateX(calc(var(--base-grid) * 1.5));
            transition: opacity .5s ease-in, transform .3s ease-in-out .25s;
        }
    </style>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item hover-light text-bold">
        {{ $settings['Translations']['media_center_reports'] }}
    </li>
@endsection

@section('content')
    <!--Page Header-->
    @include('front.includes.page-header', ['currentPage' => $settings['Translations']['media_center_reports']])

    <section id="news_general" class="padding">
        <div class="container">
            <ol class="articles">
                <!-- Loop through each article in the articles array -->
                <!-- Use the index i to apply a custom CSS animation order -->
                <!-- The article title, category, and date are displayed in two content divs -->
                <!-- The second content div is hidden from screen readers using aria-hidden -->
                @foreach($reports as $key => $report)
                    @php $colors = ['orange','green','light-blue','yellow']; $color = array_rand(['orange','green','light-blue','yellow']); @endphp
                    <li class="articles__article before-{{ $colors[$color] }}" style="--animation-order: {{ ++$key }};">
                        <a href="{{ route('front.reports.show', $report) }}"
                           class="articles__link after-{{ $colors[$color] }}">
                            <div
                                class="articles__content bg-{{ $colors[$color] }} articles__content--lhs d-flex align-items-center justify-content-center">
                                <h2 class="articles__title text-center">
                                    {{ $report->title('ar') }}
                                </h2>
                            </div>
                            <div
                                class="articles__content bg-{{ $colors[$color] }} articles__content--rhs d-flex align-items-center justify-content-center"
                                aria-hidden="true">
                                <h2 class="articles__title text-center">
                                    {{ $report->title('ar') }}
                                </h2>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    @include('front.includes.contact-section')
@endsection
